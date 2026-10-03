<?php

namespace App\Filament\Admin\Resources\EmailCampaigns\Tables;

use App\Filament\Admin\Resources\EmailDeliveries\EmailDeliveryResource;
use App\Jobs\SendCampaignEmail;
use App\Models\EmailCampaign;
use App\Models\EmailDelivery;
use App\Models\NewsletterSubscriber;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\{EditAction, DeleteAction};
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EmailCampaignsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Campaign')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('recipient_type')
                    ->label('Recipients')
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'all' => 'All API Users',
                        'administrators' => 'Administrators',
                        'publishers' => 'Publishers',
                        'active_api_users' => 'Active API Users',
                        'newsletter_subscribers' => 'Newsletter Subscribers',
                        default => ucfirst($state),
                    }),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'draft' => 'gray',
                        'queued' => 'info',
                        'sending' => 'warning',
                        'sent' => 'success',
                        'failed' => 'danger',
                        default => 'gray',
                    }),

                TextColumn::make('total_recipients')
                    ->label('Total')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable(),
            ])

            ->recordActions([
                Action::make('deliveries')
                    ->label('Delivery History')
                    ->icon('heroicon-o-envelope')
                    ->color('gray')
                    ->url(
                        fn(EmailCampaign $record): string =>
                        EmailDeliveryResource::getUrl('index', [
                            'tableFilters[campaign_id][value]' => $record->id,
                        ])
                    ),

                Action::make('send')
                    ->label('Send Campaign')
                    ->icon('heroicon-o-paper-airplane')
                    ->color('primary')
                    ->requiresConfirmation()
                    ->modalHeading('Send Email Campaign')
                    ->modalDescription(
                        'This will create a delivery for each recipient and add the emails to the queue.'
                    )
                    ->modalSubmitActionLabel('Send Campaign')
                    ->visible(
                        fn(EmailCampaign $record): bool =>
                        $record->status === 'draft'
                    )
                    ->action(function (EmailCampaign $record): void {

                        if ($record->recipient_type === 'newsletter_subscribers') {

                            $query = NewsletterSubscriber::query()
                                ->where('is_subscribed', true)
                                ->whereNotNull('email');

                            if ($record->language_id) {
                                $query->where('language_id', $record->language_id);
                            }

                            $total = $query->count();

                            if ($total === 0) {
                                throw new \RuntimeException(
                                    'No newsletter subscribers were found for this campaign.'
                                );
                            }

                            $record->update([
                                'status' => 'queued',
                                'total_recipients' => $total,
                                'sent_count' => 0,
                                'pending_count' => $total,
                                'failed_count' => 0,
                                'queued_at' => now(),
                                'started_at' => null,
                                'completed_at' => null,
                            ]);

                            $query
                                ->select([
                                    'id',
                                    'email',
                                ])
                                ->chunkById(100, function ($subscribers) use ($record): void {

                                    foreach ($subscribers as $subscriber) {

                                        $delivery = EmailDelivery::create([
                                            'email_campaign_id' => $record->id,
                                            'user_id' => null,
                                            'newsletter_subscriber_id' => $subscriber->id,
                                            'email' => $subscriber->email,
                                            'status' => 'pending',
                                            'attempts' => 0,
                                        ]);

                                        SendCampaignEmail::dispatch($delivery->id)
                                            ->onQueue('emails');
                                    }
                                });

                            return;
                        }

                        $query = match ($record->recipient_type) {

                            'administrators' => User::query()
                                ->whereHas('roles', function ($query) {
                                    $query->where('name', 'admin');
                                })
                                ->whereNotNull('email'),

                            'publishers' => User::query()
                                ->whereHas('roles', function ($query) {
                                    $query->where('name', 'publisher');
                                })
                                ->whereNotNull('email'),

                            'active_api_users' => User::query()
                                ->where('is_active', true)
                                ->whereNotNull('email'),

                            default => User::query()
                                ->whereNotNull('email'),
                        };

                        $total = $query->count();

                        if ($total === 0) {
                            throw new \RuntimeException(
                                'No recipients were found for this campaign.'
                            );
                        }

                        $record->update([
                            'status' => 'queued',
                            'total_recipients' => $total,
                            'sent_count' => 0,
                            'pending_count' => $total,
                            'failed_count' => 0,
                            'queued_at' => now(),
                            'started_at' => null,
                            'completed_at' => null,
                        ]);

                        $query
                            ->select([
                                'id',
                                'email',
                            ])
                            ->chunkById(100, function ($users) use ($record): void {

                                foreach ($users as $user) {

                                    $delivery = EmailDelivery::create([
                                        'email_campaign_id' => $record->id,
                                        'user_id' => $user->id,
                                        'newsletter_subscriber_id' => null,
                                        'email' => $user->email,
                                        'status' => 'pending',
                                        'attempts' => 0,
                                    ]);

                                    SendCampaignEmail::dispatch($delivery->id)
                                        ->onQueue('emails');
                                }
                            });
                    }),

                DeleteAction::make()
                    ->label('Delete')
                    ->icon('heroicon-o-trash')
                    ->color('danger'),

                ViewAction::make(),

                EditAction::make()
                    ->visible(
                        fn(EmailCampaign $record): bool =>
                        $record->status === 'draft'
                    ),
            ]);
    }
}
