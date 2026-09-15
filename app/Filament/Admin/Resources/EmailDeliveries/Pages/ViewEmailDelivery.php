<?php

namespace App\Filament\Admin\Resources\EmailDeliveries\Pages;

use App\Filament\Admin\Resources\EmailDeliveries\EmailDeliveryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewEmailDelivery extends ViewRecord
{
    protected static string $resource = EmailDeliveryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
