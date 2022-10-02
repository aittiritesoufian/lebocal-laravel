<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\LoginController;
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

Route::get('/', [ AnswerController::class, 'index' ])->name('Home');
Route::post('/', [ AnswerController::class, 'store' ]);
Route::get('/dashboard', [ AnswerController::class, 'dashboard' ])->name('dashboard')->middleware('auth');
Route::get('/login', [ LoginController::class, 'login' ])->name('login');
Route::get('/logout', [ LoginController::class, 'logout' ])->name('logout');
Route::post('/login', [ LoginController::class, 'authenticate' ])->name('authenticate_form');
