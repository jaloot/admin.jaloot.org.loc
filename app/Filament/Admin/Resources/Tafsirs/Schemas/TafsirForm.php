<?php

namespace App\Filament\Admin\Resources\Tafsirs\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TafsirForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('author'),
                Select::make('language_id')
                    ->relationship('language', 'name')
                    ->required(),
                TextInput::make('book_name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
            ]);
    }
}
