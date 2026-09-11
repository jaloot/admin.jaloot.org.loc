<?php

namespace App\Filament\Admin\Pages;

use App\Filament\Admin\Widgets\ApiUsageOverview;
use App\Filament\Admin\Widgets\ApiUsageChart;
use App\Filament\Admin\Widgets\RecentApiRequests;

use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use BackedEnum;
use App\Services\ApiKeyService;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use App\Models\User;

class Analytics extends Page
{
    protected string $view = 'filament.admin.pages.analytics';

    protected static ?string $title = 'API Analytics';

    protected static string|\UnitEnum|null $navigationGroup = 'Developer Tools';

    protected static ?string $navigationLabel = 'Analytics';
    protected static ?int $navigationSort = 3;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChartPie;

    protected function getHeaderWidgets(): array
    {
        return [
            ApiUsageOverview::class,
            ApiUsageChart::class,
            RecentApiRequests::class,
        ];
    }
}
