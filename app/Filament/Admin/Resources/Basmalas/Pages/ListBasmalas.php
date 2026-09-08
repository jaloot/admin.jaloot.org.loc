<?php

namespace App\Filament\Admin\Resources\Basmalas\Pages;

use App\Filament\Admin\Resources\Basmalas\BasmalaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBasmalas extends ListRecords
{
    protected static string $resource = BasmalaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
