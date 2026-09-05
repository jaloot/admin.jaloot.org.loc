<?php

namespace App\Filament\Admin\Resources\ChapterNames\Pages;

use App\Filament\Admin\Resources\ChapterNames\ChapterNameResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewChapterName extends ViewRecord
{
    protected static string $resource = ChapterNameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
