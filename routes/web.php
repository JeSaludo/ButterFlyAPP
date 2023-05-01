<?php

use App\Http\Controllers\auth\UserController;
use App\Http\Controllers\PermitController;
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


Route::get('/',[UserController::class, 'index']);






Route::get('/login', [UserController::class, 'ShowLogin'])->name('login');
Route::get('/register', [UserController::class, 'ShowRegister'])->name('register');

Route::post('register/process', [UserController::class, 'CreateAccount']);
Route::post('/login/authenticate', [UserController::class, 'Authenticate']);
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/verify-account',[UserController::class, 'VerifyAccount'])->name('verifyAccount');
Route::post('/verify-otp', [UserController::class, 'UserActivation'])->name('otp.verify');
Route::get('/user/apply-permit', function(){
    return 'APPLY PERMIT HERE';
})->middleware('auth');

//SEEDING Wild life Permit

Route::post('/admin/store-wildlife-permit', [PermitController::class, 'AddWildLifePermit']);
Route::get('/admin/create-permit', function(){
    return view('admin.add-wildlife-permit');
})->middleware("auth");

Route::get('/permit/apply', [PermitController::class, 'ShowApplyPermit']);
//ADD PERMIT
Route::post('/permit/apply-permit-process', [PermitController::class, 'CreatePermit']);