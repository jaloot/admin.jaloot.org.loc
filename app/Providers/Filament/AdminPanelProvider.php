<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Auth\Pages\PasswordReset\RequestPasswordReset;
use Filament\Enums\UserMenuPosition;
use Filament\Actions\Action;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('admin')
            ->path('')
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->domain(config('app.filament_domain'))
            ->brandLogo(asset('images/logo.svg'))
            ->darkModeBrandLogo(asset('images/logo.svg'))
            ->brandLogoHeight('2.5rem')
            ->login()
            ->registration(\App\Filament\Admin\Pages\Auth\Register::class)
            ->passwordReset()
            ->colors([
                'primary' => '#06840b',
            ])
            ->discoverResources(in: app_path('Filament/Admin/Resources'), for: 'App\Filament\Admin\Resources')
            ->discoverPages(in: app_path('Filament/Admin/Pages'), for: 'App\Filament\Admin\Pages')
            ->pages([
                //Dashboard::class,
            ])
            ->userMenuItems([
                Action::make('profile')
                    ->label('Edit Profile')
                    ->url(fn(): string => \App\Filament\Admin\Pages\EditProfile::getUrl())
                    ->icon('heroicon-o-user'),
            ])
            ->renderHook(
                PanelsRenderHook::SIDEBAR_FOOTER,
                fn(): string => view(
                    'filament.admin.sidebar.footer'
                )->render()
            )
            ->renderHook(
                PanelsRenderHook::AUTH_REGISTER_FORM_AFTER,
                fn(): string => view('filament.admin.sidebar.footer')->render(),
            )
            ->renderHook(
                PanelsRenderHook::AUTH_LOGIN_FORM_AFTER,
                fn(): string => view('filament.admin.sidebar.footer')->render(),
            )
            ->renderHook(
                'panels::head.end',
                fn(): string => request()->routeIs('filament.admin.auth.register')
                    ? '<meta name="description" content="Create your free account and get access to the Jaloot.org Quran API.">'
                    : '',
            )
            ->renderHook(
                PanelsRenderHook::AUTH_REGISTER_FORM_BEFORE,
                fn(): string => '<p class="mb-4 text-center text-sm text-gray-500 dark:text-gray-400">Create your free account and get access to the Jaloot.org Quran API.</p>',
            )
            ->globalSearch(false)
            ->discoverWidgets(in: app_path('Filament/Admin/Widgets'), for: 'App\Filament\Admin\Widgets')
            ->widgets([
                // AccountWidget::class,
                //FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
