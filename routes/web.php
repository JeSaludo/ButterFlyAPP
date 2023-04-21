<?php

use App\Http\Controllers\auth\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function(){
    return view('home');
})->middleware('auth');

Route::get('/login', [UserController::class, 'ShowLogin'])->name('login');
Route::get('/register', [UserController::class, 'ShowRegister'])->name('register');

Route::post('/register/store', [UserController::class, 'CreateAccount']);
Route::post('/login/authenticate', [UserController::class, 'Authenticate']);
Route::get('/logout', [UserController::class, 'logout']);