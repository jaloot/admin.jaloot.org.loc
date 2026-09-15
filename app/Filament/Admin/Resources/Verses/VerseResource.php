<?php

namespace App\Filament\Admin\Resources\Verses;

use App\Filament\Admin\Resources\Verses\Pages\CreateVerse;
use App\Filament\Admin\Resources\Verses\Pages\EditVerse;
use App\Filament\Admin\Resources\Verses\Pages\ListVerses;
use App\Filament\Admin\Resources\Verses\Pages\ViewVerse;
use App\Filament\Admin\Resources\Verses\Schemas\VerseForm;
use App\Filament\Admin\Resources\Verses\Schemas\VerseInfolist;
use App\Filament\Admin\Resources\Verses\Tables\VersesTable;
use App\Models\Verse;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Models\User;

class VerseResource extends Resource
{
    protected static ?string $model = Verse::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string|\UnitEnum|null $navigationGroup = 'Quran';

    protected static ?string $recordTitleAttribute = 'Verse';

    public static function form(Schema $schema): Schema
    {
        return VerseForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return VerseInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VersesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

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

    public static function getPages(): array
    {
        return [
            'index' => ListVerses::route('/'),
            'create' => CreateVerse::route('/create'),
            'view' => ViewVerse::route('/{record}'),
            'edit' => EditVerse::route('/{record}/edit'),
        ];
    }
}
