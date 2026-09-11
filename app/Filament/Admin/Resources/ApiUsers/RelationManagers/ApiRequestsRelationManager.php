<?php

namespace App\Filament\Admin\Resources\ApiUsers\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ApiRequestsRelationManager extends RelationManager
{
    protected static string $relationship = 'apiRequests';

    protected static ?string $title = 'API Requests';

    protected static string|\BackedEnum|null $icon = 'heroicon-o-arrow-path';

    public function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('endpoint')
                    ->label('Endpoint')
                    ->searchable()
                    ->copyable()
                    ->wrap(),

                TextColumn::make('method')
                    ->label('Method')
                    ->badge()
                    ->formatStateUsing(
                        fn ($state) => strtoupper($state)
                    ),

                TextColumn::make('status_code')
                    ->label('Status')
                    ->badge()
                    ->color(function ($state): string {
                        return match (true) {
                            $state >= 200 && $state < 300 => 'success',
                            $state >= 300 && $state < 400 => 'warning',
                            $state >= 400 => 'danger',
                            default => 'gray',
                        };
                    })
                    ->sortable(),

                TextColumn::make('ip')
                    ->label('IP')
                    ->copyable(),

                TextColumn::make('response_time')
                    ->label('Response')
                    ->suffix(' ms')
                    ->sortable(),

                TextColumn::make('user_agent')
                    ->label('User Agent')
                    ->limit(40)
                    ->tooltip(fn ($state) => $state),

                TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime('M d, Y H:i:s')
                    ->sortable(),
            ])
            ->recordActions([])
            ->toolbarActions([]);
    }
}