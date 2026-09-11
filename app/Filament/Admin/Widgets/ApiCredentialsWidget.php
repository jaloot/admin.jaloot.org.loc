<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\User;
use Livewire\Attributes\On;

class ApiCredentialsWidget extends Widget
{
    protected string $view = 'filament.admin.widgets.api-credentials-widget';

    #[On('refresh-api-credentials')]
    public function refresh(): void
    {}

    protected function getViewData(): array
    {
        /** @var User $user */
        $user = filament()->auth()->user();

        return [
            'apiKey' => $user->apiKeys()->latest()->first(),
        ];
    }
}
