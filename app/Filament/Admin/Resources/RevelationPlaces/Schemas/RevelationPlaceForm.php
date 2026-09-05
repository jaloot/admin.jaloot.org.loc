<?php

namespace App\Filament\Admin\Resources\RevelationPlaces\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RevelationPlaceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('place')
                    ->required(),
            ]);
    }
}
