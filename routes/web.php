<?php

use App\Http\Controllers\AuthController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/login',[AuthController::class, 'login'])->name('auth.login');
Route::get('/register',[AuthController::class, 'register'])->name('auth.register');
Route::post('/login',[AuthController::class, 'postLogin'])->name('auth.login.post');
Route::post('/register',[AuthController::class, 'postRegister'])->name('auth.register.post');
Route::get('/logout',[AuthController::class, 'logout'])->name('auth.logout');
