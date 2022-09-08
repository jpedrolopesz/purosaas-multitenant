<?php

namespace App\Http\Controllers\Central\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\UserStoreRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CompanyController extends Controller
{
    public function index()
    {

        return view('central.pages.account.company.index');
    }

    public function store(Request $request)
    {
        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $filename = time(). '.' . $logo->getClientOriginalExtension();
            Image::make($logo)->resize(80,80)->save(public_path('uploads/avatars/'. $filename));

            $company = Auth::guard('admin')->user();
            $company->logo = $filename;
            $company->save();

        }
        $admin = Auth::guard('admin')->user()->update($request->only(['company']));

        return redirect()->back()->with('success', 'Your data has been successfully updated.');


    }

}
