<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NewsletterController extends Controller
{
    public function subscribe(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'email' => [
                'required',
                'email',
                'max:255',
            ],

            'name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'locale' => [
                'required',
                'string',
                Rule::exists('languages', 'code'),
            ],
        ]);

        $language = \App\Models\Language::where(
            'code',
            $validated['locale']
        )->firstOrFail();

        $subscriber = NewsletterSubscriber::updateOrCreate(
            [
                'email' => $validated['email'],
            ],
            [
                'name' => $validated['name'] ?? null,
                'language_id' => $language->id,
                'is_subscribed' => true,
                'subscribed_at' => now(),
                'unsubscribed_at' => null,
            ]
        );

        $subscriber->load('language');

        return response()->json([
            'status' => 200,
            'message' => 'You have successfully subscribed to the newsletter.',
            'data' => [
                'email' => $subscriber->email,
                'name' => $subscriber->name,
                'language' => [
                    'id' => $subscriber->language->id,
                    'code' => $subscriber->language->code,
                    'name' => $subscriber->language->name,
                ],
                'is_subscribed' => $subscriber->is_subscribed,
            ],
        ]);
    }
}
