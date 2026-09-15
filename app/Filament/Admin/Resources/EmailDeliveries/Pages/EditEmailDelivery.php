<?php

namespace App\Filament\Admin\Resources\EmailDeliveries\Pages;

use App\Filament\Admin\Resources\EmailDeliveries\EmailDeliveryResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditEmailDelivery extends EditRecord
{
    protected static string $resource = EmailDeliveryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
