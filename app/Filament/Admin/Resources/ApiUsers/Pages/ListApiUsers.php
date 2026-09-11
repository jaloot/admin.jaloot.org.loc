<?php

namespace App\Filament\Admin\Resources\ApiUsers\Pages;

use App\Filament\Admin\Resources\ApiUsers\ApiUserResource;
use Filament\Resources\Pages\ListRecords;

class ListApiUsers extends ListRecords
{
    protected static string $resource = ApiUserResource::class;
}