<?php

namespace App\Filament\Admin\Resources\Prostrations\Pages;

use App\Filament\Admin\Resources\Prostrations\ProstrationResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditProstration extends EditRecord
{
    protected static string $resource = ProstrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
