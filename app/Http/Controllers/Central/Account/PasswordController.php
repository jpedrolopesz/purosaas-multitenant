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
        $admin = Auth::guard('admin')->user()->update([
            'password'=>bcrypt($request->password)
        ]);


        return redirect()->back()->with('success', 'Your data has been successfully updated.');

    }
}
