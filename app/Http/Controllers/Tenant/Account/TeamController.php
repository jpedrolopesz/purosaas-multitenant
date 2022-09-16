<?php

namespace App\Http\Controllers\Tenant\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\UserStoreRequest;
use App\Models\Admin;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use function Termwind\renderUsing;

class TeamController extends Controller //tenant
{
    protected $repository ;

    public function __construct( User $users)
    {
        $this->repository = $users;
    }

    public function index()
    {
        $users = $this->repository->paginate(4);
        return view('tenant.pages.account.company.team.index',
        compact('users')
        );
    }

    public function store(Request $request, Tenant $tenant)
    {


        return redirect()->back()->with('info', 'You are in the demo version. It is not possible to make a changes.');


    }

    protected function teamLimitReached($request)
    {
        return $request->user()->count() === tenant()->plan->teams_limit;
    }


    public function show($id)
    {
        $user = $this->repository->where('id', $id)->first();

        if (!$user)
            return redirect()->back();

        return view('tenant.pages.account.company.team.view',
            compact('user')
        );
    }

    public function edit($id)
    {
        $user = $this->repository->where('id', $id)->first();

        if (!$user)
            return redirect()->back();

        return view('tenant.pages.account.company.team.edit',
            compact('user'));
    }

    public function update(Request $request, $id)
    {

        return redirect()->route('tenant.account.team.index')
            ->with('info', 'You are in the demo version. It is not possible to make a changes.');

    }

    public function destroy($id)
    {

        return redirect()->back()
            ->with('info', 'You are in the demo version. It is not possible to make a changes.');

    }

}
