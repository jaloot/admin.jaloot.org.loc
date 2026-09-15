<?php

namespace App\Jobs;

use App\Mail\CampaignMail;
use App\Models\EmailDelivery;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;
use Throwable;

class SendCampaignEmail implements ShouldQueue
{
    use Queueable;

    public int $tries = 3;

    public function __construct(
        public int $deliveryId
    ) {}

    public function handle(): void
    {
        $delivery = EmailDelivery::with('campaign')
            ->find($this->deliveryId);

        if (! $delivery) {
            return;
        }

        if ($delivery->status === 'sent') {
            return;
        }

        if (! $delivery->campaign) {
            $delivery->update([
                'status' => 'failed',
                'error' => 'Email campaign not found.',
            ]);

            return;
        }

        $delivery->update([
            'status' => 'sending',
            'attempts' => $delivery->attempts + 1,
        ]);

        try {
            Mail::to($delivery->email)
                ->send(new CampaignMail($delivery->campaign));

            $delivery->update([
                'status' => 'sent',
                'sent_at' => now(),
                'error' => null,
            ]);

            $delivery->campaign->refreshStatistics();

        } catch (Throwable $exception) {

            $delivery->update([
                'status' => 'failed',
                'error' => $exception->getMessage(),
            ]);

            $delivery->campaign->refreshStatistics();

            throw $exception;
        }
    }
}
