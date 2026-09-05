<?php

namespace App\Filament\Admin\Resources\Prostrations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProstrationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('chapter.name')
                    ->state(function($record){
                        return  $record->chapter?->name?->ar;
                    })
                    ->searchable(),
                TextColumn::make('verse.number')
                    ->label('Verse'),
                TextColumn::make('verse.text')
                    ->label('Text')
                    ->limit(120)
                    ->wrap()
                    ->searchable(),
                IconColumn::make('recommended')
                    ->boolean(),
                IconColumn::make('obligatory')
                    ->boolean(),
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
