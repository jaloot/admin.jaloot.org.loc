<?php

namespace App\Filament\Admin\Resources\EmailDeliveries\Pages;

use App\Filament\Admin\Resources\EmailDeliveries\EmailDeliveryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEmailDelivery extends CreateRecord
{
    protected static string $resource = EmailDeliveryResource::class;
}
