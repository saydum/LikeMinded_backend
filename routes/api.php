<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/get', [\App\Http\Controllers\GetController::class, 'get']);

});


Route::group(['middleware' => 'guest'], function (){
    Auth::routes();
    Route::get('/vk/auth', [\App\Http\Controllers\SocialController::class, 'index'])->name('vk-auth');
    Route::get('/vk/auth/callback/', [\App\Http\Controllers\SocialController::class, 'callback']);
});
