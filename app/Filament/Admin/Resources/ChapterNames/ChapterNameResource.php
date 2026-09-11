<?php

namespace App\Filament\Admin\Resources\ChapterNames;

use App\Filament\Admin\Resources\ChapterNames\Pages\CreateChapterName;
use App\Filament\Admin\Resources\ChapterNames\Pages\EditChapterName;
use App\Filament\Admin\Resources\ChapterNames\Pages\ListChapterNames;
use App\Filament\Admin\Resources\ChapterNames\Pages\ViewChapterName;
use App\Filament\Admin\Resources\ChapterNames\Schemas\ChapterNameForm;
use App\Filament\Admin\Resources\ChapterNames\Schemas\ChapterNameInfolist;
use App\Filament\Admin\Resources\ChapterNames\Tables\ChapterNamesTable;
use App\Models\ChapterName;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ChapterNameResource extends Resource
{
    protected static ?string $model = ChapterName::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string|\UnitEnum|null $navigationGroup = 'Quran';

    protected static ?string $recordTitleAttribute = 'Chapter Name';

    public static function form(Schema $schema): Schema
    {
        return ChapterNameForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ChapterNameInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ChapterNamesTable::configure($table);
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
            'index' => ListChapterNames::route('/'),
            'create' => CreateChapterName::route('/create'),
            'view' => ViewChapterName::route('/{record}'),
            'edit' => EditChapterName::route('/{record}/edit'),
        ];
    }
}
