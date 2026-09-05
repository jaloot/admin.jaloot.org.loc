<?php

namespace App\Filament\Admin\Resources\Verses\Pages;

use App\Filament\Admin\Resources\Verses\VerseResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditVerse extends EditRecord
{
    protected static string $resource = VerseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
