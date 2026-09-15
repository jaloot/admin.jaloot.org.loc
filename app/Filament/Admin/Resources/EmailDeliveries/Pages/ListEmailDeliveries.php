<?php

namespace App\Filament\Admin\Resources\EmailDeliveries\Pages;

use App\Filament\Admin\Resources\EmailDeliveries\EmailDeliveryResource;
use Filament\Resources\Pages\ListRecords;

class ListEmailDeliveries extends ListRecords
{
    protected static string $resource = EmailDeliveryResource::class;
}