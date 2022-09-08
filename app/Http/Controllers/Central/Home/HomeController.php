<?php

namespace App\Http\Controllers\Central\Home;

use App\Http\Controllers\Controller;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $plansMonthly = Plan::where('slug', 'monthly')
        ->with('details')->orderBy('price', 'ASC')->get();

        $plansYearly = Plan::where('slug', 'yearly')
            ->with('details')->orderBy('price', 'ASC')->get();

        return view('central.home.index',
            compact('plansMonthly', 'plansYearly'));
    }
}
