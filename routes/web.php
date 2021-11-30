<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('login/laravelpassport', 'Auth\LoginController@redirectToProvider');
// Route::get('login/laravelpassport/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('login/laravelpassport', [App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider']);
Route::get('login/laravelpassport/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback']);

Route::get('/', function () {
    return view('welcome');
});
