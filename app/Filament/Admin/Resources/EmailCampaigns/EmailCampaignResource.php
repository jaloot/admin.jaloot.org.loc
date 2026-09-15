<?php

namespace App\Filament\Admin\Resources\EmailCampaigns;

use App\Filament\Admin\Resources\EmailCampaigns\Pages\CreateEmailCampaign;
use App\Filament\Admin\Resources\EmailCampaigns\Pages\EditEmailCampaign;
use App\Filament\Admin\Resources\EmailCampaigns\Pages\ListEmailCampaigns;
use App\Filament\Admin\Resources\EmailCampaigns\Pages\ViewEmailCampaign;
use App\Filament\Admin\Resources\EmailCampaigns\Schemas\EmailCampaignForm;
use App\Filament\Admin\Resources\EmailCampaigns\Schemas\EmailCampaignInfolist;
use App\Filament\Admin\Resources\EmailCampaigns\Tables\EmailCampaignsTable;
use App\Models\EmailCampaign;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Models\User;

class EmailCampaignResource extends Resource
{
    protected static ?string $model = EmailCampaign::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string|\UnitEnum|null $navigationGroup = 'Communications';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return EmailCampaignForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return EmailCampaignInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EmailCampaignsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEmailCampaigns::route('/'),
            'create' => CreateEmailCampaign::route('/create'),
            'view' => ViewEmailCampaign::route('/{record}'),
            'edit' => EditEmailCampaign::route('/{record}/edit'),
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