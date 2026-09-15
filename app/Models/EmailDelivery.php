<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmailDelivery extends Model
{
    protected $fillable = [
        'email_campaign_id',
        'user_id',
        'email',
        'status',
        'error',
        'sent_at',
        'attempts',
    ];

    protected function casts(): array
    {
        return [
            'sent_at' => 'datetime',
        ];
    }

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(EmailCampaign::class,'email_campaign_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

