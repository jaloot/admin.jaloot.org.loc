<?php

namespace App\Filament\Admin\Resources\RevelationPlaceTranslations;

use App\Filament\Admin\Resources\RevelationPlaceTranslations\Pages\CreateRevelationPlaceTranslation;
use App\Filament\Admin\Resources\RevelationPlaceTranslations\Pages\EditRevelationPlaceTranslation;
use App\Filament\Admin\Resources\RevelationPlaceTranslations\Pages\ListRevelationPlaceTranslations;
use App\Filament\Admin\Resources\RevelationPlaceTranslations\Pages\ViewRevelationPlaceTranslation;
use App\Filament\Admin\Resources\RevelationPlaceTranslations\Schemas\RevelationPlaceTranslationForm;
use App\Filament\Admin\Resources\RevelationPlaceTranslations\Schemas\RevelationPlaceTranslationInfolist;
use App\Filament\Admin\Resources\RevelationPlaceTranslations\Tables\RevelationPlaceTranslationsTable;
use App\Models\RevelationPlaceTranslation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RevelationPlaceTranslationResource extends Resource
{
    protected static ?string $model = RevelationPlaceTranslation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string|\UnitEnum|null $navigationGroup = 'Quran';

    protected static ?string $recordTitleAttribute = 'Revelation Place Translation';

    public static function form(Schema $schema): Schema
    {
        return RevelationPlaceTranslationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return RevelationPlaceTranslationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RevelationPlaceTranslationsTable::configure($table);
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
            'index' => ListRevelationPlaceTranslations::route('/'),
            'create' => CreateRevelationPlaceTranslation::route('/create'),
            'view' => ViewRevelationPlaceTranslation::route('/{record}'),
            'edit' => EditRevelationPlaceTranslation::route('/{record}/edit'),
        ];
    }
}
