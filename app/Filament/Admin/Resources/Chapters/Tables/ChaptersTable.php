<?php

namespace App\Filament\Admin\Resources\Chapters\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ChaptersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('number')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('names')
                    ->state(function ($record) {
                        return $record->names?->ar;
                    })
                    ->label('Name')
                    ->searchable(),
                TextColumn::make('revelation_order')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('revelationPlace.place')
                    ->searchable(),
                TextColumn::make('verses_count')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('start_page')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('end_page')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
