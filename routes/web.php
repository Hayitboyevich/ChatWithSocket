<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessagesConroller;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/conversation/{userId}', [MessagesConroller::class, 'conversation'])->name('message.conversation');

Route::get('auth/google', [\App\Http\Controllers\SocialController::class, 'googleRedirect'])->name('login.google');
Route::get('auth/google/callback', [\App\Http\Controllers\SocialController::class,'loginWithGoogle']);


//Route::get('auth/facebook', [\App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
//Route::get('auth/facebook/callback', [\App\Http\Controllers\Auth\LoginController::class,'handleFacebookCallback']);

Route::get('auth/facebook', [\App\Http\Controllers\SocialController::class, 'facebookRedirect'])->name('login.facebook');
Route::get('auth/facebook/callback', [\App\Http\Controllers\SocialController::class, 'loginWithFacebook']);
