<?php

namespace App\Filament\Admin\Resources\RevelationPlaces\Pages;

use App\Filament\Admin\Resources\RevelationPlaces\RevelationPlaceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRevelationPlaces extends ListRecords
{
    protected static string $resource = RevelationPlaceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
