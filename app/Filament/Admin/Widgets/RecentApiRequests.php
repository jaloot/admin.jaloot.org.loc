<?php

namespace App\Filament\Admin\Widgets;

use App\Models\ApiRequest;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentApiRequests extends BaseWidget
{
    protected static ?string $heading = 'Recent API Requests';

    protected function getTableQuery(): Builder
    {
        return ApiRequest::query()
            ->where('user_id', auth()->id())
            ->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('endpoint')
                ->label('Endpoint')
                ->searchable(),

            Tables\Columns\TextColumn::make('method')
                ->badge(),

            Tables\Columns\TextColumn::make('status_code')
                ->badge()
                ->color(fn (int $state): string => match (true) {
                    $state >= 200 && $state < 300 => 'success',
                    $state >= 400 && $state < 500 => 'warning',
                    $state >= 500 => 'danger',
                    default => 'gray',
                }),

            Tables\Columns\TextColumn::make('response_time')
                ->suffix(' ms'),

            Tables\Columns\TextColumn::make('ip'),

            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
        ];
    }
}