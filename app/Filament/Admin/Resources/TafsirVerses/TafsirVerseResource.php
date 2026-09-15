<?php

namespace App\Filament\Admin\Resources\TafsirVerses;

use App\Filament\Admin\Resources\TafsirVerses\Pages\CreateTafsirVerse;
use App\Filament\Admin\Resources\TafsirVerses\Pages\EditTafsirVerse;
use App\Filament\Admin\Resources\TafsirVerses\Pages\ListTafsirVerses;
use App\Filament\Admin\Resources\TafsirVerses\Pages\ViewTafsirVerse;
use App\Filament\Admin\Resources\TafsirVerses\Schemas\TafsirVerseForm;
use App\Filament\Admin\Resources\TafsirVerses\Schemas\TafsirVerseInfolist;
use App\Filament\Admin\Resources\TafsirVerses\Tables\TafsirVersesTable;
use App\Models\TafsirVerse;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Models\User;

class TafsirVerseResource extends Resource
{
    protected static ?string $model = TafsirVerse::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string|\UnitEnum|null $navigationGroup = 'Quran';

    protected static ?string $recordTitleAttribute = 'Tafsir Verse';

    public static function form(Schema $schema): Schema
    {
        return TafsirVerseForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TafsirVerseInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TafsirVersesTable::configure($table);
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
            'index' => ListTafsirVerses::route('/'),
            'create' => CreateTafsirVerse::route('/create'),
            'view' => ViewTafsirVerse::route('/{record}'),
            'edit' => EditTafsirVerse::route('/{record}/edit'),
        ];
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
}
