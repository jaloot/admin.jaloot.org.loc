<?php

namespace App\Filament\Admin\Resources\Verses\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class VerseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('chapter_id')
                    ->relationship('chapter')
                    ->getOptionLabelFromRecordUsing(
                        fn($record) => $record->name?->ar
                    )
                    ->required(),
                TextInput::make('number')
                    ->required()
                    ->numeric(),
                Textarea::make('text')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('line')
                    ->numeric(),
                TextInput::make('juz')
                    ->required()
                    ->numeric(),
                TextInput::make('page')
                    ->required()
                    ->numeric(),
                Select::make('transmission_id')
                    ->relationship('transmission', 'name')
                    ->required(),
                Select::make('language_id')
                    ->relationship('language', 'name')
                    ->required(),
            ]);
    }
}
