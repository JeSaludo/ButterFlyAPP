<?php

use App\Http\Controllers\auth\UserController;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
 
 
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
    return view('home');
});






Route::get('/login', [UserController::class, 'ShowLogin'])->name('login');
Route::get('/register', [UserController::class, 'ShowRegister'])->name('register');

Route::post('register/process', [UserController::class, 'CreateAccount']);
Route::post('/login/authenticate', [UserController::class, 'Authenticate']);
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/verify-account',[UserController::class, 'VerifyAccount']);
Route::post('/verify-otp', [UserController::class, 'UserActivation'])->name('verifyOTP');

