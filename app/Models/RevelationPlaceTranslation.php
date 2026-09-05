<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RevelationPlaceTranslation extends Model
{
    protected $fillable = [
        'revelation_place_id',
        'language_id',
        'name',
    ];

    public function revelationPlace(): BelongsTo
    {
        return $this->belongsTo(
            RevelationPlace::class
        );
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(
            Language::class
        );
    }
}
