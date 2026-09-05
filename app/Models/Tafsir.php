<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tafsir extends Model
{
    protected $fillable = [
        'title',
        'author',
        'language_id',
        'book_name',
        'slug',
    ];

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public function verses(): HasMany
    {
        return $this->hasMany(TafsirVerse::class);
    }
}