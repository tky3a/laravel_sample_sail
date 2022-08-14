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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

// Route::get('login', [\App\Http\Controllers\LoginController::class, 'index'])
//     ->middleware('guest')->name('login');
// Route::post('login', [\App\Http\Controllers\LoginController::class, 'authenticate'])
//     ->middleware('guest')->name('authenticate');
// Route::get('logout', [App\Http\Controllers\LoginController::class, 'logout'])
//     ->middleware('auth')->name('logout');
// Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'create'])
//     ->middleware('guest')->name('register.create');
// Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'store'])
//     ->middleware('guest')->name('register.store');
// Route::get('/payload', App\Http\Controllers\ArticlePayloadAction::class);
