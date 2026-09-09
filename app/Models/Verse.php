<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\{HasMany, HasOne};

class Verse extends Model
{
    protected $fillable = [
        'chapter_id',
        'number',
        'text',
        'text_simple',
        'line',
        'juz',
        'page',
        'transmission_id',
        'language_id',
    ];

    public function chapter(): BelongsTo
    {
        return $this->belongsTo(Chapter::class);
    }

    public function transmission(): BelongsTo
    {
        return $this->belongsTo(Transmission::class);
    }

    public function tafsirVerses(): HasMany
    {
        return $this->hasMany(TafsirVerse::class);
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public function prostration(): HasOne
    {
        return $this->hasOne(Prostration::class);
    }

}
