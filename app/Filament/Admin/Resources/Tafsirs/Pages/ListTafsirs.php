<?php

namespace App\Filament\Admin\Resources\Tafsirs\Pages;

use App\Filament\Admin\Resources\Tafsirs\TafsirResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTafsirs extends ListRecords
{
    protected static string $resource = TafsirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
