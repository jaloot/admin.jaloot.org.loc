<?php

namespace App\Filament\Admin\Resources\ApiUsers\Pages;

use App\Filament\Admin\Resources\ApiUsers\ApiUserResource;
use Filament\Resources\Pages\ViewRecord;

class ViewApiUser extends ViewRecord
{
    protected static string $resource = ApiUserResource::class;
}