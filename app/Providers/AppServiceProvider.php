<?php

namespace App\Providers;

use App\Models\Tenant;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        InitializeTenancyByDomain::$onFail = function ($exception, $request, $next) {
            return redirect()->route('auth.home-login');
        };
        Cashier::ignoreMigrations();
        Cashier::useCustomerModel(Tenant::class);
        //Cashier::calculateTaxes();
        Schema::defaultStringLength(191);

    }
}
