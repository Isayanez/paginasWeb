<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoPokemonController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\AuthController;
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
Route::get('tipos', [TipoPokemonController::class, 'index']);
Route::get('tipos/{tipoPokemon}', [TipoPokemonController::class, 'show']);
Route::post('addtipos', [TipoPokemonController::class, 'store']);
Route::put('updtipos/{tipoPokemon}', [TipoPokemonController::class, 'update']);
Route::delete('deltipos/{tipoPokemon}', [TipoPokemonController::class, 'destroy']);
Route::get('tiposall', [TipoPokemonController::class, 'all']);

//Metodos que corresponden a pokemon
Route::get('pokemons', [PokemonController::class, 'index']);
Route::get('pokemons/{pokemon}', [PokemonController::class, 'show']);
Route::post('addpokemons', [PokemonController::class, 'store']);
Route::put('updpokemons/{pokemon}', [PokemonController::class, 'update']);
Route::delete('delpokemons/{pokemon}', [PokemonController::class, 'destroy']);
Route::get('pokemonsall', [PokemonController::class, 'all']);