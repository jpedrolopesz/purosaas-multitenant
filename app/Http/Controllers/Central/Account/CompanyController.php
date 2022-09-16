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
        return redirect()->back()
            ->with('info', 'You are in the demo version. It is not possible to make a changes.');


    }

}
