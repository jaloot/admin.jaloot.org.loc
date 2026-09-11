<?php

namespace App\Filament\Admin\Resources\ApiUsers\Pages;

use App\Filament\Admin\Resources\ApiUsers\ApiUserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateApiUser extends CreateRecord
{
    protected static string $resource = ApiUserResource::class;
}
