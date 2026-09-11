<?php

namespace App\Filament\Admin\Resources\ApiUsers\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ApiUserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('User information')
                ->icon('heroicon-o-user')
                ->schema([
                    TextInput::make('name')
                        ->label('Name')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('email')
                        ->label('Email')
                        ->email()
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255),

                    Select::make('role')
                        ->label('Role')
                        ->options([
                            'admin' => 'Admin',
                            'publisher' => 'Publisher',
                        ])
                        ->required()
                        ->native(false)
                        ->dehydrated(false),
                ])
                ->columns(2),

            Section::make('Change password')
                ->icon('heroicon-o-lock-closed')
                ->description('Leave empty if you do not want to change the password.')
                ->schema([
                    TextInput::make('password')
                        ->label('New password')
                        ->password()
                        ->revealable()
                        ->confirmed()
                        ->minLength(8)
                        ->dehydrated(fn ($state): bool => filled($state)),

                    TextInput::make('password_confirmation')
                        ->label('Confirm password')
                        ->password()
                        ->revealable()
                        ->dehydrated(false),
                ])
                ->columns(2),
        ]);
    }
}