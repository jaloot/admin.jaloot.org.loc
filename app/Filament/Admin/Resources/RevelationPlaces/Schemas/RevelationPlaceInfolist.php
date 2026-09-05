<?php

namespace App\Filament\Admin\Resources\RevelationPlaces\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RevelationPlaceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('place'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
