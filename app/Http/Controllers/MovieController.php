<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MovieController extends Controller
{
    public function list(Request $request): JsonResponse
    {
        $movies = Movie::withUserId(1)->get();

        return response()->json(['data' => $movies]);
    }

    public function add(Request $request): JsonResponse
    {
        $movie           = new Movie();
        $movie->user_id  = 1;
        $movie->movie_id = (string)$request->input('id');
        $movie->title    = (string)$request->input('title');
        $movie->year     = (int)$request->input('year');
        $movie->seen     = (bool)$request->input('seen');

        $movie->save();

        return response()->json(['data' => $movie]);
    }

    public function remove(Request $request, string $movieId): Response
    {
        Movie::withUserId(1)
            ->where('movie_id', $movieId)
            ->delete();

        return response()->noContent();
    }
}
