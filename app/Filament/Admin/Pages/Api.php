<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use BackedEnum;
use App\Services\ApiKeyService;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use App\Models\User;

class Api extends Page
{
    protected string $view = 'filament.admin.pages.api';

    protected static ?string $title = 'API Details';

    protected static string|\UnitEnum|null $navigationGroup = 'Developer Tools';

    protected static ?string $navigationLabel = 'API';
    protected static ?int $navigationSort = 2;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedKey;

    protected function getHeaderWidgets(): array
    {
        return [
            
        ];
    }

    public function getSubheading(): ?string
    {
        return 'Access the Jaloot API using your API key and follow the documentation to integrate Quran data into your application.';
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
                ->modalDescription('Your current credentials will stop working immediately.')
                ->action(function () {

                    $user = filament()->auth()->user();

                    if (! $user instanceof User) {
                        return;
                    }

                    $user->apiKeys()->delete();

                    $result = app(ApiKeyService::class)->generate($user);

                    Notification::make()
                        ->title('API credentials regenerated')
                        ->success()
                        ->body('Your new API secret is available now.')
                        ->send();

                    session()->flash('new_api_secret', $result['secret']);
                }),
        ];
    }
}
