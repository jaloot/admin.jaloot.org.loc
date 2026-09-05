<?php

namespace App\Filament\Admin\Resources\Transmissions\Pages;

use App\Filament\Admin\Resources\Transmissions\TransmissionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTransmissions extends ListRecords
{
    protected static string $resource = TransmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
