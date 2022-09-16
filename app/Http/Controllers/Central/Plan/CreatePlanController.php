<?php

namespace App\Http\Controllers\Central\Plan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Central\StoreUpdatePlanRequest;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CreatePlanController extends Controller
{
    private  $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }

    public function index()
    {
        $plans = $this->repository->paginate(6);
        return view('central.pages.plans.index', compact('plans'  ));
    }

    public function create()
    {
        return view('central.pages.plans.create');
    }

    public function store(StoreUpdatePlanRequest $request)
    {



        return redirect()->route('central.pages.plans.index')
            ->with('info', 'You are in the demo version. It is not possible to make a changes.');

    }

    public function show($id)
    {
        $plan = $this->repository->where('id', $id)->first();

        if (!$plan)
            return redirect()->back();

        return view('central.pages.plans.view', compact('plan')
        );
    }

    public function edit($id)
    {
        $plan = $this->repository->where('id', $id)->first();

        if (!$plan)
            return redirect()->back();

        return view('central.pages.plans.edit', [
            'plan' => $plan
        ]);
    }

    public function update(StoreUpdatePlanRequest $request, $id)
    {

        return redirect()->route('central.pages.plans.index')
            ->with('info', 'You are in the demo version. It is not possible to make a changes.');

    }

    public function destroy($id)
    {

        return redirect()->back()
            ->with('info', 'You are in the demo version. It is not possible to make a changes.');

    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $plans = $this->repository->search($request->filter);

        return view('central.pages.plans.index', [
            'plans' => $plans,
            'filters' => $filters,
        ]);
    }
}
