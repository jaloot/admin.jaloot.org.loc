<?php

namespace App\Filament\Admin\Resources\RevelationPlaceTranslations\Pages;

use App\Filament\Admin\Resources\RevelationPlaceTranslations\RevelationPlaceTranslationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRevelationPlaceTranslations extends ListRecords
{
    protected static string $resource = RevelationPlaceTranslationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
