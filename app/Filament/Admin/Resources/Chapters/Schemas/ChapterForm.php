<?php

namespace App\Filament\Admin\Resources\Chapters\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ChapterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('number')
                    ->required()
                    ->numeric(),
                TextInput::make('slug')
                    ->required(),
                Toggle::make('has_sajda')
                    ->required(),
                TextInput::make('revelation_order')
                    ->numeric(),
                Toggle::make('has_basmala')
                    ->required(),
                Select::make('revelation_place_id')
                    ->relationship('revelationPlace', 'place')
                    ->searchable()
                    ->preload()
                    ->required(),
                Toggle::make('basmala_as_verse')
                    ->required(),
                TextInput::make('verses_count')
                    ->required()
                    ->numeric(),
                TextInput::make('start_page')
                    ->required()
                    ->numeric(),
                TextInput::make('end_page')
                    ->required()
                    ->numeric(),
            ]);
    }
}
