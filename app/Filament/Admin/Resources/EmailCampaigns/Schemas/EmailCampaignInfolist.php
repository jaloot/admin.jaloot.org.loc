<?php

namespace App\Filament\Admin\Resources\EmailCampaigns\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EmailCampaignInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Campaign Information')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Campaign Name'),

                        TextEntry::make('subject')
                            ->label('Email Subject')
                            ->columnSpanFull(),

                        TextEntry::make('recipient_type')
                            ->label('Recipients')
                            ->formatStateUsing(fn(string $state): string => match ($state) {
                                'all' => 'All API Users',
                                'administrators' => 'Administrators',
                                'publishers' => 'Publishers',
                                'active_api_users' => 'Active API Users',
                                default => ucfirst($state),
                            }),

                        TextEntry::make('status')
                            ->label('Status')
                            ->badge()
                            ->color(fn(string $state): string => match ($state) {
                                'draft' => 'gray',
                                'queued' => 'info',
                                'sending' => 'warning',
                                'sent' => 'success',
                                'failed' => 'danger',
                                default => 'gray',
                            }),
                    ])
                    ->columns(2),

                Section::make('Delivery Statistics')
                    ->schema([
                        TextEntry::make('total_recipients')
                            ->label('Total Recipients')
                            ->numeric(),

                        TextEntry::make('sent_count')
                            ->label('Sent')
                            ->numeric()
                            ->badge()
                            ->color('success'),

                        TextEntry::make('pending_count')
                            ->label('Pending')
                            ->numeric()
                            ->badge()
                            ->color('warning'),

                        TextEntry::make('failed_count')
                            ->label('Failed')
                            ->numeric()
                            ->badge()
                            ->color('danger'),
                    ])
                    ->columns(4),

                Section::make('Timeline')
                    ->schema([
                        TextEntry::make('created_at')
                            ->label('Created')
                            ->dateTime(),

                        TextEntry::make('queued_at')
                            ->label('Queued')
                            ->dateTime(),

                        TextEntry::make('started_at')
                            ->label('Started')
                            ->dateTime(),

                        TextEntry::make('completed_at')
                            ->label('Completed')
                            ->dateTime(),
                    ])
                    ->columns(4),

                Section::make('Email Content')
                    ->schema([
                        TextEntry::make('content')
                            ->label('')
                            ->html()
                            ->columnSpanFull(),
                    ]),
                Section::make('Delivery Progress')
                    ->schema([
                        TextEntry::make('delivery_progress')
                            ->label('Progress')
                            ->state(function ($record): string {
                                if ($record->total_recipients === 0) {
                                    return '0%';
                                }

                                $percentage = (
                                    $record->sent_count /
                                    $record->total_recipients
                                ) * 100;

                                return number_format($percentage, 1) . '%';
                            })
                            ->badge()
                            ->color('success'),

                        TextEntry::make('success_rate')
                            ->label('Success Rate')
                            ->state(function ($record): string {
                                if ($record->total_recipients === 0) {
                                    return '0%';
                                }

                                return number_format(
                                    ($record->sent_count / $record->total_recipients) * 100,
                                    1
                                ) . '%';
                            })
                            ->badge()
                            ->color('success'),
                    ])
                    ->columns(2),
            ]);
    }
}
