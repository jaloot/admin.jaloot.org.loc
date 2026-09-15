<?php

namespace App\Filament\Admin\Resources\EmailDeliveries;

use App\Filament\Admin\Resources\EmailDeliveries\Pages\ListEmailDeliveries;
use App\Filament\Admin\Resources\EmailDeliveries\Tables\EmailDeliveriesTable;
use App\Models\EmailDelivery;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Models\User;

class EmailDeliveryResource extends Resource
{
    protected static ?string $model = EmailDelivery::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEnvelope;

    protected static ?string $navigationLabel = 'Email Deliveries';
    protected static string|\UnitEnum|null $navigationGroup = 'Communications';

    protected static ?string $modelLabel = 'Email Delivery';

    protected static ?string $pluralModelLabel = 'Email Deliveries';

    public static function table(Table $table): Table
    {
        return EmailDeliveriesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEmailDeliveries::route('/'),
        ];
    }

    public static function canAccess(): bool
    {
        $user = filament()->auth()->user();

        if (! $user instanceof User) {
            return false;
        }

        return $user->hasRole('admin');
    }
}