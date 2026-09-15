<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmailCampaign extends Model
{
    protected $fillable = [
        'name',
        'subject',
        'content',
        'status',
        'recipient_type',
        'total_recipients',
        'sent_count',
        'pending_count',
        'failed_count',
        'queued_at',
        'started_at',
        'completed_at',
        'created_by',
    ];

    protected function casts(): array
    {
        return [
            'queued_at' => 'datetime',
            'started_at' => 'datetime',
            'completed_at' => 'datetime',
        ];
    }

    public function deliveries(): HasMany
    {
        return $this->hasMany(EmailDelivery::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function refreshStatistics(): void
    {
        $this->loadCount([
            'deliveries as total_recipients' => fn($query) => $query,
            'deliveries as sent_count' => fn($query) =>
            $query->where('status', 'sent'),
            'deliveries as pending_count' => fn($query) =>
            $query->whereIn('status', ['pending', 'sending']),
            'deliveries as failed_count' => fn($query) =>
            $query->where('status', 'failed'),
        ]);

        $total = $this->total_recipients;
        $sent = $this->sent_count;
        $pending = $this->pending_count;
        $failed = $this->failed_count;

        $status = match (true) {
            $pending > 0 && $sent === 0 && $failed === 0 => 'queued',
            $pending > 0 => 'sending',
            $pending === 0 && $failed === 0 && $sent === $total => 'sent',
            $pending === 0 && $sent === 0 && $failed === $total => 'failed',
            $pending === 0 && $sent > 0 && $failed > 0 => 'sent',
            default => $this->status,
        };

        $this->update([
            'total_recipients' => $total,
            'sent_count' => $sent,
            'pending_count' => $pending,
            'failed_count' => $failed,
            'status' => $status,
            'started_at' => $this->started_at ?? now(),
            'completed_at' => $pending === 0 ? now() : null,
        ]);
    }
}
