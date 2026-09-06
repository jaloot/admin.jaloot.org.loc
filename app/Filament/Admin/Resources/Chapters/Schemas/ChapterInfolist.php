<?php

namespace App\Filament\Admin\Resources\Chapters\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ChapterInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('number')
                    ->numeric(),
                TextEntry::make('slug'),
                IconEntry::make('has_basmala')
                    ->boolean(),
                IconEntry::make('basmala_as_verse')
                    ->boolean(),
                TextEntry::make('revelation_order')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('revelationPlace.id')
                    ->label('Revelation place'),
                IconEntry::make('has_sajda')
                    ->boolean()
                    ->getStateUsing(fn ($record) => $record->prostrations()->exists()),
                TextEntry::make('verses_count')
                    ->numeric(),
                TextEntry::make('start_page')
                    ->numeric(),
                TextEntry::make('end_page')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
