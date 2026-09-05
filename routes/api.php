<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ChapterController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('chapters', ChapterController::class)->only(['index']);
Route::get('/chapters/{chapter:slug}', [ChapterController::class, 'show']);