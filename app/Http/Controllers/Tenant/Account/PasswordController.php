<?php

namespace App\Http\Controllers\Tenant\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\PasswordStoreRequest;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function index()
    {
        return view ('tenant.pages.account.password.index');
    }

    public function store(PasswordStoreRequest $request)
    {


        return redirect()->back()->with('info', 'You are in the demo version. It is not possible to make a changes.');

    }
}
