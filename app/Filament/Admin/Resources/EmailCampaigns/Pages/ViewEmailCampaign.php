<?php

namespace App\Filament\Admin\Resources\EmailCampaigns\Pages;

use App\Filament\Admin\Resources\EmailCampaigns\EmailCampaignResource;
use Filament\Actions\{EditAction,DeleteAction};
use Filament\Resources\Pages\ViewRecord;

class ViewEmailCampaign extends ViewRecord
{
    protected static string $resource = EmailCampaignResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            DeleteAction::make(),
        ];
    }
}
