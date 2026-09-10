<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ApiKey extends Model
{
    protected $fillable = [
        'user_id',
        'api_key',
        'api_secret_hash',
        'ip',
        'email',
        'send_key',
        'agent',
        'user_registered',
    ];

    protected function casts(): array
    {
        return [
            'send_key' => 'boolean',
            'user_registered' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function requests(): HasMany
    {
        return $this->hasMany(ApiRequest::class);
    }
}