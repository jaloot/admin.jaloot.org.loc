<?php

namespace App\Filament\Admin\Resources\Basmalas\Pages;

use App\Filament\Admin\Resources\Basmalas\BasmalaResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditBasmala extends EditRecord
{
    protected static string $resource = BasmalaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
