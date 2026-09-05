<?php

namespace App\Filament\Admin\Resources\Prostrations\Pages;

use App\Filament\Admin\Resources\Prostrations\ProstrationResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProstration extends ViewRecord
{
    protected static string $resource = ProstrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
