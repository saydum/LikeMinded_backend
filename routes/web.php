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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'guest'], function (){
    Route::get('/vk/auth', [\App\Http\Controllers\SocialController::class, 'index'])->name('vk-auth');
    Route::get('/vk/auth/callback/', [\App\Http\Controllers\SocialController::class, 'callback']);
});
Route::post('/tag/add', [\App\Http\Controllers\TagController::class, 'create'])->name('tag.add');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/topic', [\App\Http\Controllers\TopicController::class, 'index'])->name('topic');
