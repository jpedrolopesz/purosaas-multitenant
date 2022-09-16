<?php

namespace App\Http\Controllers\Tenant\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\UserStoreRequest;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function index()
    {
        return view('tenant.pages.account.profile.index');
    }

    public function store(UserStoreRequest  $request)
    {

        return redirect()->back()
            ->with('info', 'You are in the demo version. It is not possible to make a changes.');

    }
}
