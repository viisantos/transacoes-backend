<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\JwtMiddleware;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::middleware('api')->group(function () {
    Route::post('save', [App\Http\Controllers\AuthController::class, 'register']);
    Route::post('login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
});

Route::middleware('auth:sanctum')->group( function(){
    Route::get('logout', [App\Http\Controllers\AuthController::class, 'logout']);
    Route::resource('transacoes', App\Http\Controllers\TransactionController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::get('resumo', [App\Http\Controllers\TransactionController::class, 'getSummary'])->name('transactions.getSummary');});


/*
{
    "email": "vitoria2@gmail.com",
    "password": "1234"
}
*/
