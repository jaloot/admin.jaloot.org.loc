<?php

namespace App\Filament\Admin\Resources\Tafsirs\Pages;

use App\Filament\Admin\Resources\Tafsirs\TafsirResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditTafsir extends EditRecord
{
    protected static string $resource = TafsirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
