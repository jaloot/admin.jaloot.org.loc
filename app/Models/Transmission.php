<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transmission extends Model
{
    protected $fillable = [
        'name',
        'language_id',
        'slug',
        'description',
    ];

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}
