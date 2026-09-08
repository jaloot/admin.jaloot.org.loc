<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AddResponseMeta
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($response instanceof JsonResponse) {
            $data = $response->getData(true);

            $meta = [
                'status' => $response->getStatusCode(),
                'response_time' => round((microtime(true) - LARAVEL_START) * 1000, 2) . 'ms',
                'cache' => [
                    'key' => $request->attributes->get('cache_key', null),
                    'hit' => $request->attributes->get('cache_hit', false),
                    'time' => $request->attributes->get('cache_time'),
                ],
            ];

            $data = ['request' => $meta] + $data;

            $response->setData($data);
        }

        return $response;
    }
}
