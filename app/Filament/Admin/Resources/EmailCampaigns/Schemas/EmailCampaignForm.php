<?php

namespace App\Filament\Admin\Resources\EmailCampaigns\Schemas;

use App\Models\Language;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EmailCampaignForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Campaign Information')
                    ->description('Configure the email campaign and its recipients.')
                    ->schema([
                        TextInput::make('name')
                            ->label('Campaign Name')
                            ->placeholder('Quran API v2.1 Release')
                            ->required()
                            ->maxLength(255),

                        Select::make('recipient_type')
                            ->label('Recipients')
                            ->options([
                                'all' => 'All API Users',
                                'administrators' => 'Administrators',
                                'publishers' => 'Publishers',
                                'active_api_users' => 'Active API Users',
                                'newsletter_subscribers' => 'Newsletter Subscribers',
                            ])
                            ->default('all')
                            ->required()
                            ->live(),

                        Select::make('language_id')
                            ->label('Language')
                            ->options(
                                fn() => Language::query()
                                    ->orderBy('name')
                                    ->pluck('name', 'id')
                                    ->toArray()
                            )
                            ->required()
                            ->visible(fn($get) => $get('recipient_type') === 'newsletter_subscribers'),
                    ])
                    ->columns(2),

                Section::make('Email Content')
                    ->description('Write the subject and content of the email.')
                    ->schema([
                        TextInput::make('subject')
                            ->label('Email Subject')
                            ->placeholder('New Quran API v2.1 is now available')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        RichEditor::make('content')
                            ->label('Email Template')
                            ->placeholder('Write your email content here...')
                            ->required()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'strike',
                                'link',
                                'blockquote',
                                'bulletList',
                                'orderedList',
                                'h2',
                                'h3',
                                'undo',
                                'redo',
                            ])
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
