<?php

namespace App\Http\Controllers\Tenant\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tenant\RegisterTenantRequest;
use App\Models\Tenant;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail;


class RegisteredTenantController extends Controller
{

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tenant.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterTenantRequest $request)
    {


        $tenant = Tenant::create($request->validated() + [
                'ready' => false,
                'trial_ends_at' => now()->addDays(config('cashier.trial_days')),
            ]);
        $tenant->createDomain(['domain' => $request->domain]);

        event(new Registered($tenant));


        return redirect(tenant_route($tenant->domains->first()
            ->domain, 'tenant.auth.login' ));

    }
}
