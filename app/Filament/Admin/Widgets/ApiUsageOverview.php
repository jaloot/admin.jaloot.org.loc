<?php

namespace App\Filament\Admin\Widgets;

use App\Models\ApiRequest;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ApiUsageOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $requests = ApiRequest::query()
            ->where('user_id', auth()->id());

        $total = (clone $requests)->count();

        $today = (clone $requests)
            ->whereDate('created_at', today())
            ->count();

        $month = (clone $requests)
            ->whereBetween('created_at', [
                now()->startOfMonth(),
                now()->endOfMonth(),
            ])
            ->count();

        $successful = (clone $requests)
            ->whereBetween('status_code', [200, 299])
            ->count();

        $successRate = $total > 0
            ? round(($successful / $total) * 100, 1)
            : 0;

        $averageResponse = (clone $requests)
            ->whereNotNull('response_time')
            ->avg('response_time');

        return [
            Stat::make(
                'Total requests',
                number_format($total)
            )
                ->description(number_format($today) . ' today')
                ->descriptionIcon('heroicon-o-arrow-trending-up')
                ->icon('heroicon-o-chart-bar'),

            Stat::make(
                'Success rate',
                $successRate . '%'
            )
                ->description($successful . ' successful requests')
                ->descriptionIcon('heroicon-o-check-circle')
                ->icon('heroicon-o-check-circle')
                ->color('success'),

            Stat::make(
                'Average response',
                round($averageResponse ?? 0) . ' ms'
            )
                ->description('Average API response time')
                ->descriptionIcon('heroicon-o-bolt')
                ->icon('heroicon-o-clock'),

            Stat::make(
                'This month',
                number_format($month)
            )
                ->description('Requests this month')
                ->descriptionIcon('heroicon-o-calendar')
                ->icon('heroicon-o-calendar'),
        ];
    }
}