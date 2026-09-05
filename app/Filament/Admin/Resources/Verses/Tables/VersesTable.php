<?php

namespace App\Filament\Admin\Resources\Verses\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VersesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('chapter_name')
                    ->label('Chapter')
                    ->state(function ($record) {
                        return match ($record->language?->code) {
                            'ar' => $record->chapter?->name?->ar,
                            'en' => $record->chapter?->name?->en,
                            'es' => $record->chapter?->name?->es,
                            'fr' => $record->chapter?->name?->fr,
                            default => $record->chapter?->name?->complex,
                        };
                    }),
                TextColumn::make('text')
                    ->label('Verse')
                    ->limit(60)
                    ->wrap()
                    ->searchable(),
                TextColumn::make('number')
                    ->label('Number')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('line')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('juz')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('page')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('transmission.name')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('language.name')
                    ->searchable(),
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
