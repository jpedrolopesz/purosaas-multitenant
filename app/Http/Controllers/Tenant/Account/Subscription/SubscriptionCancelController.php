<?php

namespace App\Http\Controllers\Tenant\Account\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionCancelController extends Controller
{



    public function cancel(Request $request)
    {
     $subscription = tenant()->subscription('default');

     $subscription->cancel();

     return back();
    }


}
