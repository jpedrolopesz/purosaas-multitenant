<?php

namespace App\Http\Controllers\Tenant\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return view ('tenant.pages.account.index');
    }
}
