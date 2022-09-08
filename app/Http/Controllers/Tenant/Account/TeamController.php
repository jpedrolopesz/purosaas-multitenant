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

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'is_admin' => ['required'],
            'password' => ['required', 'confirmed'],
        ]);

        if($this->teamLimitReached($request)){

            return back()
                ->with('error', 'You have reached the limit team for your plan.');
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => $request->is_admin,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()
            ->with('success', 'Your data has been successfully updated.');


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
        $user = $this->repository->where('id', $id)->first();

        if (!$user)
            return redirect()->back();

        $user->update($request->all());

        return redirect()->route('tenant.account.team.index')
            ->with('success', 'User successfully updated');
    }

    public function destroy($id)
    {
        $user = $this->repository->where('id', $id)->first();

        if (!$user)
            return redirect()->back();

        $user-> delete();

        return redirect()->back()
            ->with('success', 'User successfully deleted');
    }

}
