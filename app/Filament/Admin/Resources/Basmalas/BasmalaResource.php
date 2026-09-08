<?php

namespace App\Filament\Admin\Resources\Basmalas;

use App\Filament\Admin\Resources\Basmalas\Pages\CreateBasmala;
use App\Filament\Admin\Resources\Basmalas\Pages\EditBasmala;
use App\Filament\Admin\Resources\Basmalas\Pages\ListBasmalas;
use App\Filament\Admin\Resources\Basmalas\Pages\ViewBasmala;
use App\Filament\Admin\Resources\Basmalas\Schemas\BasmalaForm;
use App\Filament\Admin\Resources\Basmalas\Schemas\BasmalaInfolist;
use App\Filament\Admin\Resources\Basmalas\Tables\BasmalasTable;
use App\Models\Basmala;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BasmalaResource extends Resource
{
    protected static ?string $model = Basmala::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Basmala';

    public static function form(Schema $schema): Schema
    {
        return BasmalaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BasmalaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BasmalasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBasmalas::route('/'),
            'create' => CreateBasmala::route('/create'),
            'view' => ViewBasmala::route('/{record}'),
            'edit' => EditBasmala::route('/{record}/edit'),
        ];
    }
}
