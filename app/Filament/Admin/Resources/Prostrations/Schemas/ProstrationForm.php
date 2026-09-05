<?php

namespace App\Filament\Admin\Resources\Prostrations\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use App\Models\Verse;

class ProstrationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('chapter_id')
                    ->relationship('chapter', 'id')
                    ->getOptionLabelFromRecordUsing(
                        fn($record) => $record->number
                    )
                    ->live()
                    ->required(),

                Select::make('verse_id')
                    ->relationship('verse', 'id')
                    ->options(function (callable $get) {
                        $chapterId = $get('chapter_id');

                        if (!$chapterId) {
                            return [];
                        }

                        return Verse::query()
                            ->where('chapter_id', $chapterId)
                            ->orderBy('number')
                            ->get()
                            ->mapWithKeys(fn($verse) => [
                                $verse->id => $verse->number . ' — ' . $verse->text,
                            ]);
                    })
                    ->optionsLimit(1000)
                    ->searchable()
                    ->required(),

                Toggle::make('recommended')
                    ->required(),

                Toggle::make('obligatory')
                    ->required(),
            ]);
    }
}
