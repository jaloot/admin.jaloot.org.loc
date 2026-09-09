<?php

namespace App\Filament\Admin\Resources\RevelationPlaceTranslations\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RevelationPlaceTranslationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('revelation_place_id')
                    ->relationship('revelationPlace', 'place')
                    ->required(),
                Select::make('language_id')
                    ->relationship('language', 'name')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('place')
                    ->required()
                    ->label('Translated Place'),
            ]);
    }
}
