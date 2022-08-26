<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ClimaController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('Login', 'Auth\AuthController@getLogin');
Route::get('/login', [AuthController::class, 'getLogin']);

Route::post('/login', [AuthController::class, 'postLogin']);

Route::get('/clima', [ClimaController::class, 'getClima']);

Route::post('/clima', [ClimaController::class, 'store']);

Route::get('/listado', [ClimaController::class, 'getListado']);

Route::get('/borrar/usuario/{id}', [UserController::class, 'deleteUser']);
Route::get('/editar/usuario/{id}', [UserController::class, 'getUser']);
Route::patch('/actualizar/usuario', [UserController::class, 'updateUser']);

Route::get('/prevision', [ClimaController::class, 'getPrevision']);
Route::get('/prevision/{id}', [ClimaController::class, 'destroy']);

Route::get('logout', ['as' => 'logout', 'uses' => 'App\Http\Controllers\Auth\AuthController@getLogout']);
 
// Registration routes...
Route::get('/register', [AuthController::class, 'getRegister']);
Route::post('register', [AuthController::class, 'postRegister']);
