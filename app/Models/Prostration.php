<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prostration extends Model
{
    protected $fillable = [
        'chapter_id',
        'verse_id',
        'recommended',
        'obligatory',
    ];

    public function chapter(): BelongsTo
    {
        return $this->belongsTo(Chapter::class);
    }

    public function verse(): BelongsTo
    {
        return $this->belongsTo(Verse::class);
    }
}