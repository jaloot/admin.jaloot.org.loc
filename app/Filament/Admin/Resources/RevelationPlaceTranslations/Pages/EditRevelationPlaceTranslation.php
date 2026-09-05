<?php

namespace App\Filament\Admin\Resources\RevelationPlaceTranslations\Pages;

use App\Filament\Admin\Resources\RevelationPlaceTranslations\RevelationPlaceTranslationResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRevelationPlaceTranslation extends EditRecord
{
    protected static string $resource = RevelationPlaceTranslationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
