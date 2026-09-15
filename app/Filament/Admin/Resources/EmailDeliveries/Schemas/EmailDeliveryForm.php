<?php

namespace App\Filament\Admin\Resources\EmailDeliveries\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class EmailDeliveryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('email_campaign_id')
                    ->email()
                    ->required()
                    ->numeric(),
                Select::make('user_id')
                    ->relationship('user', 'name'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('status')
                    ->required()
                    ->default('pending'),
                Textarea::make('error')
                    ->columnSpanFull(),
                DateTimePicker::make('sent_at'),
                TextInput::make('attempts')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
