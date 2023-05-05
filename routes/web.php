<?php

use App\Http\Controllers\auth\AdminController;
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

    Route::get('/verify-account',[UserController::class, 'VerifyAccount'])->name('verifyAccount');
    Route::post('/verify-otp', [UserController::class, 'UserActivation'])->name('otp.verify');

    Route::middleware(['auth', 'verified'])->group(function(){
        Route::get('/permit/apply', [PermitController::class, 'ShowApplyPermit']);
        Route::post('/permit/apply-permit-process', [PermitController::class, 'RegisterApplication']);        
        Route::get('/logout', [UserController::class, 'logout']);
        
        
    });

    Route::get('/admin/login', [AdminController::class, 'ShowLogin'])->name('admin.login');
    Route::post('/admin/login/authenticate', [AdminController::class, 'Authenticate']);
    
    
    Route::middleware(['admin.auth'])->group(function () {
        Route::get('admin/dashboard', [AdminController::class, 'ShowDashboard'])->name('admin.dashboard')->middleware('admin.auth');
        Route::post('/admin/store-wildlife-permit', [PermitController::class, 'AddWildLifePermit']);
        Route::get('/admin/create-permit', function(){
        return view('admin.add-wildlife-permit');
        });
        Route::get('/admin/register', [AdminController::class, 'ShowRegister']);
    
        Route::post('/admin/register/process', [AdminController::class, 'CreateAccount']);
        Route::get('/admin/logout', [AdminController::class, 'logout']);
    });
    
   
   
    
        
  
        