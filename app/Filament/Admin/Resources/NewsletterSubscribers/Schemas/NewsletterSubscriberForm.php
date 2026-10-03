<?php

namespace App\Filament\Admin\Resources\NewsletterSubscribers\Schemas;

use App\Models\Language;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class NewsletterSubscriberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),

                TextInput::make('name')
                    ->label('Name'),

                Select::make('language_id')
                    ->label('Language')
                    ->options(fn () => Language::query()
                        ->orderBy('name')
                        ->pluck('name', 'id')
                        ->toArray()
                    )
                    ->required(),

                Toggle::make('is_subscribed')
                    ->label('Subscribed')
                    ->default(true)
                    ->required(),

                DateTimePicker::make('subscribed_at')
                    ->label('Subscribed At'),

                DateTimePicker::make('unsubscribed_at')
                    ->label('Unsubscribed At'),
            ]);
    }
}