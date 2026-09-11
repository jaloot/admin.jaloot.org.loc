<?php

namespace App\Filament\Admin\Resources\Transmissions;

use App\Filament\Admin\Resources\Transmissions\Pages\CreateTransmission;
use App\Filament\Admin\Resources\Transmissions\Pages\EditTransmission;
use App\Filament\Admin\Resources\Transmissions\Pages\ListTransmissions;
use App\Filament\Admin\Resources\Transmissions\Pages\ViewTransmission;
use App\Filament\Admin\Resources\Transmissions\Schemas\TransmissionForm;
use App\Filament\Admin\Resources\Transmissions\Schemas\TransmissionInfolist;
use App\Filament\Admin\Resources\Transmissions\Tables\TransmissionsTable;
use App\Models\Transmission;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TransmissionResource extends Resource
{
    protected static ?string $model = Transmission::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string|\UnitEnum|null $navigationGroup = 'Quran';

    protected static ?string $recordTitleAttribute = 'Transmission';

    public static function form(Schema $schema): Schema
    {
        return TransmissionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TransmissionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TransmissionsTable::configure($table);
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
            'index' => ListTransmissions::route('/'),
            'create' => CreateTransmission::route('/create'),
            'view' => ViewTransmission::route('/{record}'),
            'edit' => EditTransmission::route('/{record}/edit'),
        ];
    }
}
