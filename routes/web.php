<?php

use App\Http\Controllers\AdminCRUDController;
use App\Http\Controllers\ApplicationFormController;
use App\Http\Controllers\auth\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\auth\ResetPasswordController;
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


    Route::get('/',[UserController::class, 'index'])->name('home');

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
        Route::get('admin/dashboard', function(){return redirect('admin/dashboard/users');});
        Route::get('admin/dashboard/users', [AdminController::class, 'ShowDashboardUsers'])->name('admin.dashboard')->middleware('admin.auth');
        Route::post('/admin/store-wildlife-permit', [PermitController::class, 'AddWildLifePermit']);
        Route::get('/admin/create-permit', function(){
        return view('admin.add-wildlife-permit');
        });
        Route::get('/admin/logout', [AdminController::class, 'logout']);
        

        Route::get('/admin/dashboard/users/create', [AdminCRUDController::class, 'create'])->name('admin.users.create');
        Route::post('/admin/dashboard/users/store', [AdminCRUDController::class, 'store'])->name('admin.users.store');
        Route::get('/admin/dashboard/users/{user}/edit', [AdminCRUDController::class, 'edit'])->name('admin.users.edit');
        Route::put('/admin/dashboard/users/{user}', [AdminCRUDController::class, 'update'])->name('admin.users.update');
        Route::delete('/admin/application/{form}', [AdminCRUDController::class,'deleteApplication'])->name('delete-application');
        Route::post('/admin/application/{form}/approve', [AdminCRUDController::class,'approveApplication'])->name('approve-application');
        Route::post('/admin/application/{form}/deny', [AdminCRUDController::class,'denyApplication'])->name('deny-application');

        Route::get('/admin/application/{id}/edit', [AdminCRUDController::class, 'editApplication'])->name('edit-application');
        Route::put('/admin/application/{id}', [AdminCRUDController::class, 'updateApplication'])->name('update-application');   

        Route::delete('/admin/users/{user}', [AdminCRUDController::class,'destroy'])->name('admin.users.destroy');
    
       Route::get('admin/dashboard/applications', [AdminCRUDController::class, 'showApplicationForm'])->name('application-form');
    });
        
    Route::get('/admin/register', [AdminController::class, 'ShowRegister']);    
    Route::post('/admin/register/process', [AdminController::class, 'CreateAccount']);
    
    Route::get('/admin/application-forms/{id}', [AdminCRUDController::class,'viewApplication'])->name('application-forms.show');

    
    Route::get('/test/web', function(){
        return view('recreate.register-application');
    });
        


Route::get('password/reset', [ForgotPasswordController::class,'showResetForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('password/reset/reset', [ResetPasswordController::class,'reset'])->name('password.update');