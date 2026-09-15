<?php

namespace App\Filament\Admin\Resources\ApiUsers;

use App\Filament\Admin\Resources\ApiUsers\Pages\EditApiUser;
use App\Filament\Admin\Resources\ApiUsers\Pages\ListApiUsers;
use App\Filament\Admin\Resources\ApiUsers\Pages\ViewApiUser;
use App\Filament\Admin\Resources\ApiUsers\RelationManagers\ApiRequestsRelationManager;
use App\Filament\Admin\Resources\ApiUsers\Schemas\ApiUserForm;
use App\Filament\Admin\Resources\ApiUsers\Schemas\ApiUserInfolist;
use App\Filament\Admin\Resources\ApiUsers\Tables\ApiUsersTable;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ApiUserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;

    protected static ?string $navigationLabel = 'Users';
    protected static string|\UnitEnum|null $navigationGroup = 'Developer Tools';

    protected static ?string $modelLabel = 'User';

    protected static ?string $pluralModelLabel = 'Users';

    protected static ?int $navigationSort = 10;

    public static function canAccess(): bool
    {
        return self::is_allowed();
    }

    public static function canCreate(): bool
    {
        return self::is_allowed();
    }

    public static function canEdit($record): bool
    {
        return self::is_allowed();
    }

    public static function canDelete($record): bool
    {
        return self::is_allowed();
    }

    public static function canDeleteAny(): bool
    {
        return self::is_allowed();
    }

    private static function is_allowed()
    {
        $user = filament()->auth()->user();

        if (! $user instanceof User) {
            return false;
        }

        return $user->hasRole('admin');
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->whereHas('apiKeys');
    }

    public static function form(Schema $schema): Schema
    {
        return ApiUserForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ApiUserInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ApiUsersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            ApiRequestsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListApiUsers::route('/'),
            'view' => ViewApiUser::route('/{record}'),
            'edit' => EditApiUser::route('/{record}/edit'),
        ];
    }
}