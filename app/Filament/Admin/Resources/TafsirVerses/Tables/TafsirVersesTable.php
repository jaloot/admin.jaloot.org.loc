<?php

namespace App\Filament\Admin\Resources\TafsirVerses\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TafsirVersesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('chapter.name')
                    ->label('Chapter')
                    ->state(function ($record) {
                        return match ($record->language?->code) {
                            'ar' => $record->chapter?->name?->ar,
                            'en' => $record->chapter?->name?->en,
                            'es' => $record->chapter?->name?->es,
                            'fr' => $record->chapter?->name?->fr,
                            default => $record->chapter?->name?->complex,
                        };
                    })
                    ->searchable(
                        query: function ($query, string $search) {
                            $query->whereHas('chapter.name', function ($query) use ($search) {
                                $query->where(function ($query) use ($search) {
                                    $query->where('ar', 'ilike', "%{$search}%")
                                        ->orWhere('en', 'ilike', "%{$search}%")
                                        ->orWhere('es', 'ilike', "%{$search}%")
                                        ->orWhere('fr', 'ilike', "%{$search}%")
                                        ->orWhere('complex', 'ilike', "%{$search}%");
                                });
                            });
                        }
                    ),
                TextColumn::make('verse.text')
                    ->limit(60)
                    ->wrap()
                    ->searchable(),
                TextColumn::make('language.name')
                    ->searchable(),
                TextColumn::make('tafsir.title')
                    ->searchable(),
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
