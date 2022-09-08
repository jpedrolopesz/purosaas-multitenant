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
        tenant()->update([
            'password'=>bcrypt($request->password)
        ]);

        return redirect()->back()->with('success', 'Your data has been successfully updated.');
    }
}
