<?php

namespace App\Filament\Admin\Resources\Verses\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class VerseInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('chapter_name')
                    ->label('Chapter')
                    ->state(function ($record) {
                        return match ($record->language?->code) {
                            'ar' => $record->chapter?->names?->ar,
                            'en' => $record->chapter?->names?->en,
                            'es' => $record->chapter?->names?->es,
                            'fr' => $record->chapter?->names?->fr,
                            default => $record->chapter?->names?->complex,
                        };
                    }),
                TextEntry::make('number')
                    ->numeric(),
                TextEntry::make('text')
                    ->columnSpanFull(),
                TextEntry::make('text_simple')
                    ->columnSpanFull(),
                TextEntry::make('transliteration')
                    ->columnSpanFull(),
                TextEntry::make('line')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('juz')
                    ->numeric(),
                TextEntry::make('page')
                    ->numeric(),
                TextEntry::make('transmission.name')
                    ->label('Transmission'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('language.name')
                    ->label('Language'),
            ]);
    }
}
