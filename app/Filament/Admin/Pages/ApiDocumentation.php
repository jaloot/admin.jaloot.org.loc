<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use BackedEnum;



class ApiDocumentation extends Page
{
    protected string $view = 'filament.admin.pages.doc';
    protected static ?string $title = 'API Documentation';
    protected static string|\UnitEnum|null $navigationGroup = 'Developer Tools';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocument;

    protected static ?string $navigationLabel = 'Documentation';

    protected static ?int $navigationSort = 1;

    protected function getViewData(): array
    {
        return [
            'baseUrl' => config('app.api_quran_jaloot'),
            'docUrl' => config('app.doc_url'),
        ];
    }
}
