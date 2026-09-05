<?php

namespace App\Filament\Admin\Resources\TafsirVerses\Pages;

use App\Filament\Admin\Resources\TafsirVerses\TafsirVerseResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTafsirVerse extends ViewRecord
{
    protected static string $resource = TafsirVerseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
