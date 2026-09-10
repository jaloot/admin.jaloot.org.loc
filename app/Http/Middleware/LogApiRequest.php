<?php

namespace App\Http\Middleware;

use App\Models\ApiKey;
use App\Models\ApiRequest;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogApiRequest
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {
        $start = microtime(true);

        $response = $next($request);

        $responseTime = (int) round(
            (microtime(true) - $start) * 1000
        );

        /** @var ApiKey|null $apiKey */
        $apiKey = $request->attributes->get('api_key');

        if ($apiKey) {
            ApiRequest::create([
                'api_key_id' => $apiKey->id,
                'user_id' => $apiKey->user_id,
                'endpoint' => '/' . ltrim($request->path(),'/'),
                'method' => $request->method(),
                'status_code' => $response->getStatusCode(),
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'response_time' => $responseTime,
            ]);
        }

        return $response;
    }
}