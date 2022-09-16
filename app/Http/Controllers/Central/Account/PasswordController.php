<?php

namespace App\Http\Controllers\Central\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Central\PasswordAdminStoreRequest;
use Illuminate\Support\Facades\Auth;


class PasswordController extends Controller
{
    public function index()
    {
        return view ('central.pages.account.password.index');
    }

    public function store(PasswordAdminStoreRequest $request)
    {
        return redirect()->back()
            ->with('info', 'You are in the demo version. It is not possible to make a changes.');

    }
}
