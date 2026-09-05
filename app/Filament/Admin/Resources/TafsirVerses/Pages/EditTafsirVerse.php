<?php

namespace App\Filament\Admin\Resources\TafsirVerses\Pages;

use App\Filament\Admin\Resources\TafsirVerses\TafsirVerseResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditTafsirVerse extends EditRecord
{
    protected static string $resource = TafsirVerseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
