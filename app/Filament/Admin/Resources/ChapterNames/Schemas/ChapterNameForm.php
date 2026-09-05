<?php

namespace App\Filament\Admin\Resources\ChapterNames\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ChapterNameForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('chapter_id')
                    ->relationship('chapter', 'slug')
                    ->required(),
                TextInput::make('ar')
                    ->required(),
                TextInput::make('en')
                    ->required(),
                TextInput::make('es')
                    ->required(),
                TextInput::make('fr')
                    ->required(),
                TextInput::make('complex')
                    ->required(),
            ]);
    }
}
