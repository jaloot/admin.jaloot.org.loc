<?php

namespace App\Filament\Admin\Resources\ChapterNames\Pages;

use App\Filament\Admin\Resources\ChapterNames\ChapterNameResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditChapterName extends EditRecord
{
    protected static string $resource = ChapterNameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
