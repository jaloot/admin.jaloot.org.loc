<?php

namespace App\Filament\Admin\Resources\Prostrations\Pages;

use App\Filament\Admin\Resources\Prostrations\ProstrationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProstrations extends ListRecords
{
    protected static string $resource = ProstrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
