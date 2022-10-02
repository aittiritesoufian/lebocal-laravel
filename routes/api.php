<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\LoginController;
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
Route::post('/auth', [LoginController::class, 'apiAuthenticate'])->name('api_login');
Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});
Route::get('/logout', function (Request $request) {
    $user = $request->user();
    $user->tokens()->currentAccessToken()->delete();

    return ['status' => 'Logged out'];
});
Route::middleware('auth:sanctum')->get('/answers', [ AnswerController::class, 'get' ]);
