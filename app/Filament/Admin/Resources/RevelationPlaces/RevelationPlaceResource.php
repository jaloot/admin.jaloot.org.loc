<?php

namespace App\Filament\Admin\Resources\RevelationPlaces;

use App\Filament\Admin\Resources\RevelationPlaces\Pages\CreateRevelationPlace;
use App\Filament\Admin\Resources\RevelationPlaces\Pages\EditRevelationPlace;
use App\Filament\Admin\Resources\RevelationPlaces\Pages\ListRevelationPlaces;
use App\Filament\Admin\Resources\RevelationPlaces\Pages\ViewRevelationPlace;
use App\Filament\Admin\Resources\RevelationPlaces\Schemas\RevelationPlaceForm;
use App\Filament\Admin\Resources\RevelationPlaces\Schemas\RevelationPlaceInfolist;
use App\Filament\Admin\Resources\RevelationPlaces\Tables\RevelationPlacesTable;
use App\Models\RevelationPlace;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RevelationPlaceResource extends Resource
{
    protected static ?string $model = RevelationPlace::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string|\UnitEnum|null $navigationGroup = 'Quran';

    protected static ?string $recordTitleAttribute = 'Revelation Place';

    public static function form(Schema $schema): Schema
    {
        return RevelationPlaceForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return RevelationPlaceInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RevelationPlacesTable::configure($table);
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
            'index' => ListRevelationPlaces::route('/'),
            'create' => CreateRevelationPlace::route('/create'),
            'view' => ViewRevelationPlace::route('/{record}'),
            'edit' => EditRevelationPlace::route('/{record}/edit'),
        ];
    }
}
