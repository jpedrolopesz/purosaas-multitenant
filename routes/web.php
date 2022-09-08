<?php

use App\Http\Controllers\Central\Account\AdminController;
use App\Http\Controllers\Central\Account\CompanyController;
use App\Http\Controllers\Central\Account\PasswordController;
use App\Http\Controllers\Central\Auth\AuthenticatedAdminController;
use App\Http\Controllers\Central\Auth\RegisteredAdminController;
use App\Http\Controllers\Central\CentralController;
use App\Http\Controllers\Central\Home\HomeController;
use App\Http\Controllers\Central\Plan\CreatePlanController;
use App\Http\Controllers\Central\Plan\DetailPlanController;
use App\Http\Controllers\Tenant\Auth\AuthenticatedHomeController;
use App\Http\Controllers\Tenant\Auth\RegisteredTenantController;
use Illuminate\Support\Facades\Route;


/** Homepage */
Route::get('/', [HomeController::class, 'index'])->name('home');

/** Login Domain Tenant */
Route::get('login', [AuthenticatedHomeController::class, 'create'])->name('auth.home-login');
Route::post('login', [AuthenticatedHomeController::class, 'store'])->name('auth.home-login');


/** Register Tenant */
Route::get('register', [RegisteredTenantController::class, 'create'])->name('auth.register');
Route::post('register', [RegisteredTenantController::class, 'store'])->name('auth.register');


Route::group(['prefix' => 'central',  'as' => 'central.'], function() {
    Route::group(['middleware' => 'admin.guest'], function(){

        /** Login Admin */
        Route::get('/login', [AuthenticatedAdminController::class, 'create'])->name('auth.login');
        Route::post('/login', [AuthenticatedAdminController::class, 'store'])->name('auth.login');

        /** Register Admin */
        Route::get('/register', [RegisteredAdminController::class, 'create'])->name('auth.register');
        Route::post('/register', [RegisteredAdminController::class, 'store'])->name('auth.register');



    });

    Route::group(['middleware' => 'admin.auth'], function(){
        /** Dashboard */
        Route::get('/', [CentralController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AuthenticatedAdminController::class, 'logout'])->name('logout');


        //** Create Plans */
        Route::group(['prefix' => 'plan'], function () {


            Route::delete('/{id}/details/{idDetail}', [DetailPlanController::class, 'destroy'])->name('details.destroy');
            Route::put('/{id}/details/{idDetail}', [DetailPlanController::class, 'update'])->name('details.update');
            Route::post('/{id}/details', [DetailPlanController::class, 'store'])->name('details.store');
            Route::get('/{id}/details/create', [DetailPlanController::class, 'create'])->name('pages.plans.details.create');
            Route::get('/{id}/details', [DetailPlanController::class, 'index'])->name('pages.plans.details.index');
            Route::get('/{id}/details/{idDetail}/edit', [DetailPlanController::class, 'edit'])->name('pages.plans.details.edit');


            Route::get('/create', [CreatePlanController::class, 'create'])->name('pages.plans.create');
            Route::any('/search', [CreatePlanController::class, 'search'])->name('plans.search');
            Route::post('/', [CreatePlanController::class, 'store'])->name('plans.store');
            Route::put('/{id}', [CreatePlanController::class, 'update'])->name('plans.update');
            Route::delete('/{id}', [CreatePlanController::class, 'destroy'])->name('plans.destroy');
            Route::get('/', [CreatePlanController::class, 'index'])->name('pages.plans.index');
            Route::get('/view/{id}', [CreatePlanController::class, 'show'])->name('pages.plans.view');
            Route::get('/{id}/edit', [CreatePlanController::class, 'edit'])->name('pages.plans.edit');

        });
    });

    /** Account Admin */
    Route::group(['prefix' => 'account', 'as' => 'account.'], function () {

        /** Admin Company */
        Route::get('company', [CompanyController::class, 'index'])->name('company.index');
        Route::post('company', [CompanyController::class, 'store'])->name('company.store');

        /** Admin Profile */
        Route::get('profile', [AdminController::class, 'index'])->name('profile.index');
        Route::post('profile', [AdminController::class, 'store'])->name('profile.store');

        /** Admin Password  */
        Route::get('password', [PasswordController::class, 'index'])->name('password.index');
        Route::post('password', [PasswordController::class, 'store'])->name('password.store');


    });
});









