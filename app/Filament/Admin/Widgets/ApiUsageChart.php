<?php

namespace App\Filament\Admin\Widgets;

use App\Models\ApiRequest;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class ApiUsageChart extends ChartWidget
{
    protected ?string $heading = 'API Requests';

    protected function getData(): array
    {
        $start = now()->subDays(29)->startOfDay();

        $requests = ApiRequest::query()
            ->where('user_id', auth()->id())
            ->where('created_at', '>=', $start)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('total', 'date');

        $labels = [];
        $data = [];

        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i);

            $key = $date->format('Y-m-d');

            $labels[] = $date->format('d M');
            $data[] = $requests[$key] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Requests',
                    'data' => $data,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}