<?php

namespace App\Http\Controllers\Central;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Plan;
use App\Models\Tenant;
use Stripe\Balance;
use Stripe\Charge;
use Stripe\StripeClient;


class CentralController extends Controller
{
    public $balance;
    public $charges;
    public $tenants;
    public $plans;


    protected function getBalance() {
        return Balance::retrieve(['api_key' => config('cashier.secret')]);
    }

    protected function getCharge($id)
    {
        return Charge::retrieve(['id' => $id, 'expand' => ['balance_transaction']], ['api_key' => config('cashier.secret')]);
    }

    protected function listCharges($options = []) {
        return Charge::all($options, ['api_key' => config('cashier.secret')]);
    }

    public function index()
    {

        $balance = $this->balance = ($this->getBalance())->toArray();
        $charges = $this->charges = ($this->listCharges())->toArray();
        $tenants = $this->tenants = count(Tenant::all());
        $plans = $this->plans = count(Plan::all());
        return view('central.pages.dashboard',
        compact('tenants', 'balance','charges', 'plans'));
    }

}
