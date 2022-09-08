<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Admin;

class TenantController extends Controller
{
    public function index()
    {
        return view('tenant.pages.dashboard');
    }

}
