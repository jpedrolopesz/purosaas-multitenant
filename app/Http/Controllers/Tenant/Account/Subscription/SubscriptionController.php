<?php

namespace App\Http\Controllers\Tenant\Account\Subscription;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Laravel\Cashier\Exceptions\IncompletePayment;

class SubscriptionController extends Controller
{

    //Checkout
    public function subscription( Request $request, $plan_id)
    {
        $plan = tenancy()->central(function () use ( $request,$plan_id) {
            return Plan::findOrFail($plan_id);
        } );

        return view('tenant.pages.account.subscription.subscription',
            ['intent'=> tenant()->createSetupIntent()],
            compact('plan' ));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function processSubscription(Request $request)
    {
        return redirect()->route('tenant.account.plans.index')
            ->with('info', 'You are in the demo version. It is not possible to make a changes.');


    }


}
