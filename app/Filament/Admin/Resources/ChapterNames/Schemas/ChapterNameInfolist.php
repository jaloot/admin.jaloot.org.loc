<?php

namespace App\Filament\Admin\Resources\ChapterNames\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ChapterNameInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('chapter.id')
                    ->label('Chapter'),
                TextEntry::make('ar'),
                TextEntry::make('en'),
                TextEntry::make('es'),
                TextEntry::make('fr'),
                TextEntry::make('complex'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
