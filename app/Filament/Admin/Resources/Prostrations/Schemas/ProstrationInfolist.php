<?php

namespace App\Filament\Admin\Resources\Prostrations\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProstrationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('chapter.id')
                    ->label('Chapter'),
                TextEntry::make('verse.text')
                    ->label('Verse'),
                IconEntry::make('recommended')
                    ->boolean(),
                IconEntry::make('obligatory')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
