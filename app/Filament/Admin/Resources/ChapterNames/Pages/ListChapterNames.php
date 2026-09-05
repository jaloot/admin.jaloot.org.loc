<?php

namespace App\Filament\Admin\Resources\ChapterNames\Pages;

use App\Filament\Admin\Resources\ChapterNames\ChapterNameResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListChapterNames extends ListRecords
{
    protected static string $resource = ChapterNameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
