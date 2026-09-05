<?php

namespace App\Filament\Admin\Resources\Tafsirs\Pages;

use App\Filament\Admin\Resources\Tafsirs\TafsirResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTafsir extends ViewRecord
{
    protected static string $resource = TafsirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
