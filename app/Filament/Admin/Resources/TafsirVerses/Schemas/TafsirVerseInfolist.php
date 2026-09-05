<?php

namespace App\Filament\Admin\Resources\TafsirVerses\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TafsirVerseInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('chapter.name')
                    ->state(function ($record) {
                        return match ($record->language?->code) {
                            'ar' => $record->chapter?->names?->ar,
                            'en' => $record->chapter?->names?->en,
                            'es' => $record->chapter?->names?->es,
                            'fr' => $record->chapter?->names?->fr,
                            default => $record->chapter?->names?->complex,
                        };
                    })
                    ->label('Chapter'),
                TextEntry::make('verse.text')
                    ->label('Verse'),
                TextEntry::make('text')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('language.name')
                    ->label('Language'),
                TextEntry::make('tafsir.title')
                    ->label('Tafsir'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
