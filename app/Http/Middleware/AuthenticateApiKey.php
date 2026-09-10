<?php

namespace App\Http\Middleware;

use App\Models\ApiKey;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateApiKey
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {
        $apiKey = $request->header('X-API-Key');
        $apiSecret = $request->header('X-API-Secret');

        if (! $apiKey || ! $apiSecret) {
            return response()->json([
                'status' => 401,
                'error' => 'missing_api_credentials',
                'message' => 'API credentials are required.',
            ], 401);
        }

        $key = ApiKey::where('api_key', $apiKey)
            ->first();

        if (! $key) {
            return response()->json([
                'status' => 401,
                'error' => 'invalid_api_key',
                'message' => 'Invalid API key.',
            ], 401);
        }

        $secretHash = hash('sha256', $apiSecret);

        if (! hash_equals($key->api_secret_hash, $secretHash)) {
            return response()->json([
                'status' => 401,
                'error' => 'invalid_api_secret',
                'message' => 'Invalid API secret.',
            ], 401);
        }

        // Attach API key to current request
        $request->attributes->set('api_key', $key);

        return $next($request);
    }
}