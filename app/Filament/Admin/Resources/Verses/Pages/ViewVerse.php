<?php

namespace App\Filament\Admin\Resources\Verses\Pages;

use App\Filament\Admin\Resources\Verses\VerseResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewVerse extends ViewRecord
{
    protected static string $resource = VerseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
