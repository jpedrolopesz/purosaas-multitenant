<?php

namespace App\Http\Controllers\Tenant\Account\Subscription;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class SubscriptionCardController extends Controller
{
    public function index(Request $request)
    {
        $plan = tenancy()->central(function ($tenant) {
           Plan::get();
        });
        $intent = tenant()->createSetupIntent();

        return view('tenant.pages.account.subscription.card-update',
            compact( 'plan','intent'));
    }

    public function store(Request $request)
    {

        return redirect()->back()
        ->with('info', 'You are in the demo version. It is not possible to make a changes.');

    }
}
