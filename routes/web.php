<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\APIController;
use App\Http\Controllers\APITypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeamController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(UserController::class)->group(function(){
    Route::get('/user', 'index');
    Route::get('/user/{user}', 'show');
});

Route::controller(TeamController::class)->group(function(){
    Route::get('/team', 'index');
    Route::get('/team/{team}', 'show');
});

Route::controller(APIController::class)->group(function(){
    Route::get('/ua', 'index');
    Route::get('/ua/create', 'create');
    Route::get('/ua/{api}', 'show');
});

Route::controller(APITypeController::class)->group(function(){
    Route::get('/type', 'index');
    Route::get('/type/{api_type}', 'show');
});
