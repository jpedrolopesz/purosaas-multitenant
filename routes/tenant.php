<?php

declare(strict_types=1);

use App\Http\Controllers\Tenant\Account\AccountController;
use App\Http\Controllers\Tenant\Account\CompanyController;
use App\Http\Controllers\Tenant\Account\PasswordController;
use App\Http\Controllers\Tenant\Account\PlanController;
use App\Http\Controllers\Tenant\Account\Subscription\SubscriptionCancelController;
use App\Http\Controllers\Tenant\Account\Subscription\SubscriptionCardController;
use App\Http\Controllers\Tenant\Account\Subscription\SubscriptionController;
use App\Http\Controllers\Tenant\Account\Subscription\SubscriptionInvoiceController;
use App\Http\Controllers\Tenant\Account\TeamController;
use App\Http\Controllers\Tenant\Account\UserController;
use App\Http\Controllers\Tenant\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Tenant\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Tenant\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Tenant\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Tenant\Auth\NewPasswordController;
use App\Http\Controllers\Tenant\Auth\PasswordResetLinkController;
use App\Http\Controllers\Tenant\Auth\VerifyEmailController;
use App\Http\Controllers\Tenant\Home\HomeController;
use App\Http\Controllers\Tenant\TenantController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

Route::group(['as' => 'tenant.', 'middleware' => ['web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,]
], function (){

    Auth::routes(['verify' => true]);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('auth.login');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('auth.login');

    Route::middleware('guest')->group(function () {


        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
            ->name('password.request');

        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
            ->name('password.email');

        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
            ->name('password.reset');

        Route::post('reset-password', [NewPasswordController::class, 'store'])
            ->name('password.update');
    });

    Route::middleware('auth')->group(function () {

        Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
            ->name('verification.notice');

        Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
            ->middleware(['signed', 'throttle:6,1'])
            ->name('verification.verify');

        Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
            ->middleware('throttle:6,1')
            ->name('verification.send');

        Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
            ->name('password.confirm');

        Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
    });


    /** Home Tenant */
    Route::get('/',[HomeController::class, 'index'])->name('index');

    /** Dashboard */
    Route::group(['prefix' => 'dashboard', 'middleware' => ['auth'],'as' => 'dashboard.'], function (){
        Route::get('/', [TenantController::class, 'index'])->name('dashboard');
    });

    /** Subscription */
    Route::group(['prefix' => 'subscription', 'middleware' => ['auth'],'as' => 'subscription.'], function (){
        Route::get('/{plan_id}', [SubscriptionController::class, 'subscription'])->name('subscription');
        Route::post('/', [SubscriptionController::class, 'processSubscription'])->name('process');
        Route::post('/cancel', [SubscriptionCancelController::class, 'cancel'])->name('cancel');

    });

    /** Account Tenant */
    Route::group(['prefix' => 'account', 'middleware' => ['auth'], 'as' => 'account.'], function () {
        Route::get('/', [AccountController::class, 'index'])->name('index');

        /** User Profile */
        Route::get('profile', [UserController::class, 'index'])->name('profile.index');
        Route::post('profile', [UserController::class, 'store'])->name('profile.store');

        /** Password Profile */
        Route::get('password', [PasswordController::class, 'index'])->name('password.index');
        Route::post('password', [PasswordController::class, 'store'])->name('password.store');

        Route::group([ 'middleware' => ['is_admin']], function () {

            /**  Company */
            Route::get('company', [CompanyController::class, 'index'])->name('company.index');
            Route::post('company', [CompanyController::class, 'store'])->name('company.store');

            /**  Manage Team */
            Route::delete('team/{id}', [TeamController::class, 'destroy'])->name('team.destroy');
            Route::post('team', [TeamController::class, 'store'])->name('team.store');
            Route::put('team/view/{id}', [TeamController::class, 'update'])->name('team.update');
            Route::get('team', [TeamController::class, 'index'])->name('team.index');
            Route::get('team/{id}/edit', [TeamController::class, 'edit'])->name('team.edit');
            Route::get('team/view/{id}', [TeamController::class, 'show'])->name('team.view');

            Route::get('plans', [PlanController::class, 'index'])->name('plans.index');

            Route::group([ 'middleware' => ['subscribed']], function () {

                /** Subscription Profile */
                Route::get('/subscription', [PlanController::class, 'view'])->name('subscription.details');
                Route::post('/', [PlanController::class, 'store'])->name('subscription.store');

                /** Subscription Card Update */
                Route::get('/card-update', [SubscriptionCardController::class, 'index'])->name('subscription.card-update');
                Route::post('/card-update', [SubscriptionCardController::class, 'store'])->name('card-update');

                /** Invoice */
                Route::get('/invoice', [SubscriptionInvoiceController::class, 'index'])->name('invoice.index');
                Route::get('/invoice/{id}', [SubscriptionInvoiceController::class, 'show'])->name('invoice');
            });
        });
    });
});

