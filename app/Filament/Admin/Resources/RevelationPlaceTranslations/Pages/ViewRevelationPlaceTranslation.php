<?php

namespace App\Filament\Admin\Resources\RevelationPlaceTranslations\Pages;

use App\Filament\Admin\Resources\RevelationPlaceTranslations\RevelationPlaceTranslationResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRevelationPlaceTranslation extends ViewRecord
{
    protected static string $resource = RevelationPlaceTranslationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
