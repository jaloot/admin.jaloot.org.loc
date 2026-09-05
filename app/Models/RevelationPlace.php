<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RevelationPlace extends Model
{
    protected $fillable = [
        'place',
    ];

    public function translations(): HasMany
    {
        return $this->hasMany(
            RevelationPlaceTranslation::class
        );
    }
}
