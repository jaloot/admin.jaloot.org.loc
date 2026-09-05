<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TafsirVerse extends Model
{
    protected $fillable = [
        'chapter_id',
        'verse_id',
        'text',
        'language_id',
        'tafsir_id',
    ];

    public function chapter(): BelongsTo
    {
        return $this->belongsTo(Chapter::class);
    }

    public function verse(): BelongsTo
    {
        return $this->belongsTo(Verse::class);
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public function Tafsir(): BelongsTo
    {
        return $this->belongsTo(Tafsir::class);
    }
}
