<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClimaController;

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

Route::get('/prevision/muyfrio', [ClimaController::class, 'getMuyfrioAPI']);
Route::get('/prevision/frio', [ClimaController::class, 'getFrioAPI']);
Route::get('/prevision/calor', [ClimaController::class, 'getCalorAPI']);
Route::get('/prevision/muchocalor', [ClimaController::class, 'getMuchoCalorAPI']);
