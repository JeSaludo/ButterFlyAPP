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
    return view('welcome');
});

Route::get('/home', function(){
    return redirect('/');
})->middleware('auth');

Route::get('/user/register-transport-permit', function(){
    return view('user.register-transport-permit');
})->middleware('auth');

Route::get('/user/view-existing-transport-permit', function(){
    return view('user.view-transport-permit');
})->middleware('auth');

Route::get('/login', [UserController::class, 'ShowLogin'])->name('login');
Route::get('/register', [UserController::class, 'ShowRegister'])->name('register');

Route::post('/register/store', [UserController::class, 'CreateAccount']);
Route::post('/login/authenticate', [UserController::class, 'Authenticate']);
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

//Verify Email Section

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

////

