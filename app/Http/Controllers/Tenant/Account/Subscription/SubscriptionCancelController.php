<?php

namespace App\Http\Controllers\Tenant\Account\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionCancelController extends Controller
{



    public function cancel(Request $request)
    {

     return back()
        ->with('info', 'You are in the demo version. It is not possible to make a changes.');

    }


}
