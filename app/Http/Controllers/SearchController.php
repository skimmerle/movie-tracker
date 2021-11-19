<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Skimmerle\MovieApi\OpenMovie;

class SearchController extends Controller
{
    public function search(Request $request, OpenMovie $openMovie): JsonResponse
    {
        $request->validate([
            'title' => 'required|string|max:255'
        ]);

        $title = (string)$request->input('title');

        $movies = $openMovie->searchByTitle($title);

        return response()->json(['data' => $movies]);
    }
}
