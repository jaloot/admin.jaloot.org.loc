<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Language;

class NewsletterSubscriber extends Model
{
    protected $fillable = [
        'email',
        'name',
        'language_id',
        'is_subscribed',
        'subscribed_at',
        'unsubscribed_at',
    ];

    protected $casts = [
        'is_subscribed' => 'boolean',
        'subscribed_at' => 'datetime',
        'unsubscribed_at' => 'datetime',
    ];

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}