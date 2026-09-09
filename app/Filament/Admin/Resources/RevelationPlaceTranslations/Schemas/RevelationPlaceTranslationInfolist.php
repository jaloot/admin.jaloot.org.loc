<?php

namespace App\Filament\Admin\Resources\RevelationPlaceTranslations\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RevelationPlaceTranslationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('revelationPlace.place')
                    ->label('Revelation place'),
                TextEntry::make('language.name')
                    ->label('Language'),
                TextEntry::make('name'),
                TextEntry::make('place')
                    ->label('Translated Place'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
