<?php

namespace App\Filament\Admin\Resources\RevelationPlaces\Pages;

use App\Filament\Admin\Resources\RevelationPlaces\RevelationPlaceResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRevelationPlace extends ViewRecord
{
    protected static string $resource = RevelationPlaceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
