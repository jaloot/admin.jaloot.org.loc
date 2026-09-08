<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo};

class Basmala extends Model
{
    protected $fillable = [
        'value',
        'language_id'
    ];

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}
