<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany, HasOne};

class Chapter extends Model
{
    protected $fillable = [
        'number',
        'slug',
        'has_basmala',
        'basmala_as_verse',
        'revelation_order',
        'revelation_place_id',
        'verses_count',
        'start_page',
        'end_page',
    ];

    protected $casts = [
        'has_basmala' => 'boolean',
        'basmala_as_verse' => 'boolean',
        'has_sajda' => 'boolean',
    ];

    public function revelationPlace(): BelongsTo
    {
        return $this->belongsTo(RevelationPlace::class);
    }

    public function name(): HasOne
    {
        return $this->hasOne(ChapterName::class);
    }

    public function prostrations(): HasMany
    {
        return $this->hasMany(Prostration::class);
    }

    public function verses(): HasMany
    {
        return $this->hasMany(Verse::class);
    }
}
