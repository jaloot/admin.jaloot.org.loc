<?php

namespace App\Filament\Admin\Resources\Prostrations;

use App\Filament\Admin\Resources\Prostrations\Pages\CreateProstration;
use App\Filament\Admin\Resources\Prostrations\Pages\EditProstration;
use App\Filament\Admin\Resources\Prostrations\Pages\ListProstrations;
use App\Filament\Admin\Resources\Prostrations\Pages\ViewProstration;
use App\Filament\Admin\Resources\Prostrations\Schemas\ProstrationForm;
use App\Filament\Admin\Resources\Prostrations\Schemas\ProstrationInfolist;
use App\Filament\Admin\Resources\Prostrations\Tables\ProstrationsTable;
use App\Models\Prostration;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProstrationResource extends Resource
{
    protected static ?string $model = Prostration::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string|\UnitEnum|null $navigationGroup = 'Quran';

    protected static ?string $recordTitleAttribute = 'Prostration';

    public static function form(Schema $schema): Schema
    {
        return ProstrationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProstrationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProstrationsTable::configure($table);
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
            'index' => ListProstrations::route('/'),
            'create' => CreateProstration::route('/create'),
            'view' => ViewProstration::route('/{record}'),
            'edit' => EditProstration::route('/{record}/edit'),
        ];
    }
}
