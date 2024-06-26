<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ChampionshipController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/upload', [ImageController::class, 'upload']);
Route::get('/images/{filename}', [ImageController::class, 'show']);


Route::get('/campeonatos', [ChampionshipController::class, 'index']);
Route::post('/campeonatos/criar', [ChampionshipController::class, 'createChampionship']);

Route::get('/teams', [TeamController::class, 'listTeams']);