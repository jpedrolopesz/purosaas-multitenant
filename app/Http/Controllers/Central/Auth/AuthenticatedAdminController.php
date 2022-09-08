<?php

namespace App\Http\Controllers\Central\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedAdminController extends Controller
{
    public function create(){

        return view('central.auth.login');
    }
    public function store(Request $request) {

        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password],$request->get('remember'))) {

            return redirect()->intended(RouteServiceProvider::ADMIN_HOME);

        } else {
            session()->flash('error','Either Email/Password is incorrect');
            return back()->withInput($request->only('email'));
        }

    }

    public function logout() {
        Auth::logout();
        return redirect()->route('central.auth.login');
    }
}

