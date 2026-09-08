<?php

namespace App\Filament\Admin\Resources\Basmalas\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class BasmalaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('value')
                    ->required()
                    ->columnSpanFull(),
                Select::make('language_id')
                    ->relationship('language', 'name')
                    ->required(),
            ]);
    }
}
