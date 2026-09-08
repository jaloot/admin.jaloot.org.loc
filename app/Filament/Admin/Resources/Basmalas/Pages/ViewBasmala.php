<?php

namespace App\Filament\Admin\Resources\Basmalas\Pages;

use App\Filament\Admin\Resources\Basmalas\BasmalaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBasmala extends ViewRecord
{
    protected static string $resource = BasmalaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
