<?php

namespace App\Services;

use App\Models\ApiKey;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ApiKeyService
{
    /**
     * Generate API credentials.
     *
     * @return array{
     *     apiKey: ApiKey,
     *     secret: string
     * }
     */
    public function generate(User $user): array
    {
        $apiKey = 'JALOOT-PUB-' . Str::random(30);
        $secret = 'JALOOT-SEC-'.Str::random(55).'QJ';

        $apiKeyModel = $user->apiKeys()->create([
            'api_key' => $apiKey,
            'api_secret_hash' => hash('sha256', $secret),
            'ip' => request()->ip(),
            'email' => $user->email,
            'send_key' => false,
            'agent' => request()->userAgent(),
            'user_registered' => now(),
        ]);

        return [
            'apiKey' => $apiKeyModel,
            'secret' => $secret,
        ];
    }
}