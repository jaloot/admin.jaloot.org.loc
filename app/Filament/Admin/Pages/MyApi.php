<?php

namespace App\Filament\Admin\Pages;

use App\Filament\Admin\Widgets\ApiUsageOverview;
use App\Filament\Admin\Widgets\ApiUsageChart;
use App\Filament\Admin\Widgets\RecentApiRequests;

use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use BackedEnum;
use App\Services\ApiKeyService;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class MyApi extends Page
{
    protected string $view = 'filament.admin.pages.my-api';

    protected static ?string $title = 'My API';

    protected static ?string $navigationLabel = 'My API';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedKey;

    protected function getHeaderWidgets(): array
    {
        return [
            ApiUsageOverview::class,
            ApiUsageChart::class,
            RecentApiRequests::class,
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('regenerate')
                ->label('Regenerate credentials')
                ->icon('heroicon-o-arrow-path')
                ->color('danger')
                ->requiresConfirmation()
                ->modalHeading('Regenerate API credentials')
                ->modalDescription(
                    'Your current credentials will stop working immediately.'
                )
                ->action(function () {

                    $user = auth()->user();

                    $user->apiKeys()->delete();

                    $result = app(ApiKeyService::class)
                        ->generate($user);

                    Notification::make()
                        ->title('API credentials regenerated')
                        ->success()
                        ->body(
                            'Your new API secret is available now.'
                        )
                        ->send();

                    session()->flash(
                        'new_api_secret',
                        $result['secret']
                    );
                }),
        ];
    }
}
