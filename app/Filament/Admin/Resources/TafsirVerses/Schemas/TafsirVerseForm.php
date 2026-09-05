<?php

namespace App\Filament\Admin\Resources\TafsirVerses\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;

class TafsirVerseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('chapter_id')
                    ->relationship('chapter', 'id')
                    ->getOptionLabelFromRecordUsing(function ($record) {
                        return $record->name?->ar ?? $record->number;
                    })
                    ->searchable()
                    ->required(),
                Select::make('verse_id')
                    ->relationship('verse', 'id')
                    ->getOptionLabelFromRecordUsing(function ($record) {
                        return $record->number . ' — ' . \Illuminate\Support\Str::limit(
                            strip_tags($record->text),
                            100
                        );
                    })
                    ->searchable()
                    ->required(),
                RichEditor::make('text')
                    ->columnSpanFull(),
                Select::make('language_id')
                    ->relationship('language', 'name')
                    ->required(),
                Select::make('tafsir_id')
                    ->relationship('tafsir', 'title')
                    ->required(),
            ]);
    }
}
