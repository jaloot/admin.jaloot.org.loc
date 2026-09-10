<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ChapterController;
use App\Models\Chapter;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::domain(config('app.api_quran_jaloots'))
    ->middleware([
        'api.key',
        'api.log',
    ])
    ->group(function () {
        Route::prefix('chapters')->group(function () {
            Route::get('/', [ChapterController::class, 'index']);
        });

        Route::prefix('chapter')->group(function () {

            Route::bind('chapter', function ($value) {

                if (! is_string($value) || ! preg_match('/^[a-zA-Z0-9\-]+$/', $value)) {
                    abort(response()->json([
                        'status' => 422,
                        'error' => 'invalid_identifier',
                        'message' => "The identifier '{$value}' is not a valid chapter id or slug.",
                        'documentation_url' => config('app.doc_url'),
                    ], 422));
                }

                $chapter = Chapter::where('slug', $value)
                    ->when(is_numeric($value), fn($q) => $q->orWhere('number', $value))
                    ->first();

                if (! $chapter) {
                    abort(response()->json([
                        'status' => 404,
                        'error' => 'chapter_not_found',
                        'message' => "No chapter found for identifier '{$value}'.",
                        'documentation_url' => config('app.doc_url'),
                    ], 404));
                }

                return $chapter;
            });

            Route::get('/{chapter?}', [ChapterController::class, 'show']);
        });
    });
