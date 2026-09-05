<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChapterName extends Model
{
    protected $fillable = [
        'chapter_id',
        'ar',
        'en',
        'es',
        'fr',
        'complex',
    ];

    public function chapter(): BelongsTo
    {
        return $this->belongsTo(Chapter::class);
    }
}