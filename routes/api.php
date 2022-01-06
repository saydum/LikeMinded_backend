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

Route::group(['middleware' => 'guest'], function (){
    Route::get('/vk/auth', [\App\Http\Controllers\SocialController::class, 'index'])->name('vk-auth');
    Route::get('/vk/auth/callback/', [\App\Http\Controllers\SocialController::class, 'callback']);
});

Route::apiResources([
    'topics' => \App\Http\Controllers\Api\TopicController::class,
]);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/topic/add', [\App\Http\Controllers\TopicController::class, 'index'])->name('create');
Route::get('/topic', [\App\Http\Controllers\TopicController::class, 'index'])->name('topic');
Route::post('/tag/add', [\App\Http\Controllers\TagController::class, 'create'])->name('tag.add');
