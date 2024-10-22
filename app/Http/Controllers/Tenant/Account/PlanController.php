<?php

namespace App\Http\Controllers\Tenant\Account;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Laravel\Cashier\Exceptions\IncompletePayment;

class PlanController extends Controller
{
    public $plan = '';

    public function index()
    {

        $plansMonthly = tenancy()->central(function ($tenant) {
            return Plan::where('slug', 'monthly')->get();
        });
        $plansYearly = tenancy()->central(function ($tenant) {
            return Plan::where('slug', 'yearly')->get();
        });
        return view('tenant.pages.account.plans.index',
            compact('plansMonthly', 'plansYearly'  ));

    }


    public function view(Request $request)
    {
        $plans = tenancy()->central(function () use($request) {

            return Plan::where('slug', '!=', tenant())->get();
        });

        return view('tenant.pages.account.plans.index', compact('plans'));
    }

    public function  store(Request $request)
    {
        $plan = tenancy()->central(function () use($request) {

            return Plan::where('slug', $request->plan_id)->first();

        });
        try {
            tenant()->subscription('default')->swapAndInvoice($request->plan);
        } catch (IncompletePayment $e) {
            return redirect()->route('cashier.payment',
                [$e->payment->id,
                    'redirect' => route('tenant.pages.account.plans.index')
                ]);

        }
        return back();
    }


}
