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
        $movies = Movie::withUserId($request->user()->id)->get();

        return response()->json(['data' => $movies]);
    }

    public function add(Request $request): JsonResponse
    {
        $movie          = new Movie();
        $movie->userId  = $request->user()->id;
        $movie->movieId = (string)$request->input('movieId');
        $movie->title   = (string)$request->input('title');
        $movie->year    = (int)$request->input('year');
        $movie->seen    = (bool)$request->input('seen');
        $movie->like    = (bool)$request->input('like');

        $movie->save();

        return response()->json(['data' => $movie]);
    }

    public function remove(Request $request, int $movieId): Response
    {
        Movie::withUserId($request->user()->id)
            ->where('movieId', $movieId)
            ->delete();

        return response()->noContent();
    }
}
