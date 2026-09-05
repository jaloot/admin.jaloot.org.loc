<?php

namespace App\Filament\Admin\Resources\ChapterNames\Pages;

use App\Filament\Admin\Resources\ChapterNames\ChapterNameResource;
use Filament\Resources\Pages\CreateRecord;

class CreateChapterName extends CreateRecord
{
    protected static string $resource = ChapterNameResource::class;
}
