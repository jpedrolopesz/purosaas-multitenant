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
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time(). '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(80,80)->save(public_path('uploads/avatars/'. $filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();

        }

        $request->user()->update($request->only('name', 'email'));


        return redirect()->back()->with('success', 'Your data has been successfully updated.');

    }
}
