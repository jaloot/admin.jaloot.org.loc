<?php

namespace App\Filament\Admin\Resources\Tafsirs;

use App\Filament\Admin\Resources\Tafsirs\Pages\CreateTafsir;
use App\Filament\Admin\Resources\Tafsirs\Pages\EditTafsir;
use App\Filament\Admin\Resources\Tafsirs\Pages\ListTafsirs;
use App\Filament\Admin\Resources\Tafsirs\Pages\ViewTafsir;
use App\Filament\Admin\Resources\Tafsirs\Schemas\TafsirForm;
use App\Filament\Admin\Resources\Tafsirs\Schemas\TafsirInfolist;
use App\Filament\Admin\Resources\Tafsirs\Tables\TafsirsTable;
use App\Models\Tafsir;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TafsirResource extends Resource
{
    protected static ?string $model = Tafsir::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Tafsir';

    public static function form(Schema $schema): Schema
    {
        return TafsirForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TafsirInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TafsirsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function canAccess(): bool
    {
        return auth()->user()?->hasRole('admin') ?? false;
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTafsirs::route('/'),
            'create' => CreateTafsir::route('/create'),
            'view' => ViewTafsir::route('/{record}'),
            'edit' => EditTafsir::route('/{record}/edit'),
        ];
    }
}
