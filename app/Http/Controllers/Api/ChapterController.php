<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index() : JsonResponse
    {
        $chapters = Chapter::with([
            'names',
            'revelationPlace',
            'prostrations',
        ])->get();

        return response()->json($chapters);
    }

    public function show(Request $request, Chapter $chapter): JsonResponse
    {
        $lang = $request->query('lang', 'ar');

        $chapter->load([
            'names',
            'prostrations',
        ]);

        $chapter->name = $chapter->names?->ar;
        $chapter->name_complex = $chapter->names?->complex;

        unset(
            $chapter->names,
        );

        return response()->json($chapter);
    }
}
