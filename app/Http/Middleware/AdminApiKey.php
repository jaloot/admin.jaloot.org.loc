<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminApiKey
{
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = $request->attributes->get('api_key');

        if (! $apiKey) {
            return response()->json([
                'status' => 401,
                'error' => 'api_authentication_required',
                'message' => 'API authentication is required.',
            ], 401);
        }

        $user = $apiKey->user;

        if (! $user || ! $user->hasRole('admin')) {
            return response()->json([
                'status' => 403,
                'error' => 'admin_access_required',
                'message' => 'This endpoint requires an administrator API key.',
            ], 403);
        }

        return $next($request);
    }
}
