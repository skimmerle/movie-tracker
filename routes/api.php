<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix'     => 'v1.0',
    'middleware' => [
//        'auth:sanctum',
    ]
], function () {
    Route::get('/movies', [
        \App\Http\Controllers\MovieController::class,
        'list',
    ])->name('movies.list');

    Route::post('/movies', [
        \App\Http\Controllers\MovieController::class,
        'add',
    ])->name('movies.add');

    Route::delete('/movies/{id}', [
        \App\Http\Controllers\MovieController::class,
        'remove',
    ])->name('movies.remove');

    Route::get('/movies/search', [
        \App\Http\Controllers\SearchController::class,
        'search',
    ])->name('movies.search');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
