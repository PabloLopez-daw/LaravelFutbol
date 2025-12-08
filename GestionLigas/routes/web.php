<?php

use App\Http\Controllers\LigaController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\JugadorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return redirect()->route('liga.index'); });

Route::resource('liga', LigaController::class);
Route::resource('equipo', EquipoController::class);
Route::resource('jugador', JugadorController::class);