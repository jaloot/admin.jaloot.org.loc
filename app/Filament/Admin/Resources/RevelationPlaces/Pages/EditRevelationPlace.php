<?php

namespace App\Filament\Admin\Resources\RevelationPlaces\Pages;

use App\Filament\Admin\Resources\RevelationPlaces\RevelationPlaceResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRevelationPlace extends EditRecord
{
    protected static string $resource = RevelationPlaceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
