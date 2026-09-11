<?php

namespace App\Filament\Admin\Resources\ApiUsers\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ApiUserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('User information')
                ->icon('heroicon-o-user')
                ->schema([
                    TextEntry::make('name')
                        ->label('Name'),

                    TextEntry::make('email')
                        ->label('Email')
                        ->copyable(),

                    TextEntry::make('roles.name')
                        ->label('Role')
                        ->badge(),

                    TextEntry::make('created_at')
                        ->label('Registered')
                        ->dateTime('M d, Y H:i'),

                    TextEntry::make('email_verified_at')
                        ->label('Email verified')
                        ->dateTime('M d, Y H:i')
                        ->placeholder('Not verified'),
                ])
                ->columns(2),

            Section::make('API usage')
                ->icon('heroicon-o-chart-bar')
                ->schema([
                    TextEntry::make('total_requests')
                        ->label('Total requests')
                        ->state(fn ($record) => $record->apiRequests()->count()),

                    TextEntry::make('total_api_keys')
                        ->label('API keys')
                        ->state(fn ($record) => $record->apiKeys()->count()),

                    TextEntry::make('last_api_request')
                        ->label('Last request')
                        ->state(function ($record) {
                            return $record->apiRequests()
                                ->latest()
                                ->value('created_at')
                                ?->format('M d, Y H:i:s') ?? 'Never';
                        }),
                ])
                ->columns(3),
        ]);
    }
}