<?php

namespace App\Http\Controllers\Tenant\Home;

use App\Http\Controllers\Controller;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('tenant.home.index');
    }
}
