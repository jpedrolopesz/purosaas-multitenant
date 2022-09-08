<?php

namespace App\Http\Controllers\Central\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\UserStoreRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index()
    {
        return view('central.pages.account.profile.index');
    }

    public function store(UserStoreRequest $request)
    {
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time(). '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(80,80)->save(public_path('uploads/avatars/'. $filename));

            $user = Auth::guard('admin')->user();
            $user->avatar = $filename;
            $user->save();

        }
        $admin = Auth::guard('admin')->user()->update($request->only(['name', 'email']));


        return redirect()->back()->with('success', 'Your data has been successfully updated.');

    }

}
