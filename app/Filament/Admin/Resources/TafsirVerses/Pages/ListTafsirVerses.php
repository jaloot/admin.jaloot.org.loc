<?php

namespace App\Filament\Admin\Resources\TafsirVerses\Pages;

use App\Filament\Admin\Resources\TafsirVerses\TafsirVerseResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTafsirVerses extends ListRecords
{
    protected static string $resource = TafsirVerseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
