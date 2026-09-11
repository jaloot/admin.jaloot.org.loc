<?php

namespace App\Filament\Admin\Resources\ApiUsers\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ApiUsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('name')
                    ->label('User')
                    ->searchable()
                    ->sortable()
                    ->weight('medium'),

                TextColumn::make('email')
                    ->searchable()
                    ->copyable(),

                TextColumn::make('roles.name')
                    ->label('Role')
                    ->badge(),

                TextColumn::make('latestApiKey.api_key')
                    ->label('API Key')
                    ->formatStateUsing(function ($state) {
                        if (! $state) {
                            return '-';
                        }

                        return substr($state, 0, 14) . '...';
                    })
                    ->copyable(),

                TextColumn::make('api_requests_count')
                    ->label('Requests')
                    ->counts('apiRequests')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Registered')
                    ->dateTime('M d, Y')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('role')
                    ->label('Role')
                    ->options([
                        'admin' => 'Admin',
                        'publisher' => 'Publisher',
                    ])
                    ->query(function ($query, array $data) {
                        if (filled($data['value'] ?? null)) {
                            $query->role($data['value']);
                        }
                    }),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make()
                    ->visible(fn ($record) => ! $record->is(auth()->user())),
            ])
            ->toolbarActions([]);
    }
}