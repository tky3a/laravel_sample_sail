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

Route::post('/publishers', [App\Http\Controllers\PublisherAction::class, 'create'])->name('publishers.create');

Route::group(['middleware' => 'api'], function ($router) {
    // ログインを行いアクセストークンを発行するルート
    Route::post('/users/login', \App\Http\Controllers\User\LoginAction::class);
    // アクセストークンを用いて、認証ユーザーの情報を取得する
    Route::post('users', \App\Http\Controllers\User\RetrieveAction::class)->middleware('auth:jwt');
});
