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

        $delivery->update([
            'status' => 'sending',
            'attempts' => $delivery->attempts + 1,
        ]);

        try {

            Mail::to($delivery->email)
                ->send(
                    new CampaignMail($delivery->campaign)
                );

            $delivery->update([
                'status' => 'sent',
                'sent_at' => now(),
                'error' => null,
            ]);
        } catch (Throwable $exception) {

            $delivery->update([
                'status' => 'failed',
                'error' => $exception->getMessage(),
            ]);

            throw $exception;
        }
    }
}
