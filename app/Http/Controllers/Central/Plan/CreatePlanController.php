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
        $data = $request->all();
        $data['url'] = Str::kebab($request->name);
        $this->repository->create($data);

        return redirect()->route('central.pages.plans.index')
            ->with('success', 'Your plan has been created successfully');
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
        $plan = $this->repository->where('id', $id)->first();

        if (!$plan)
            return redirect()->back();

        $plan->update($request->all());

        return redirect()->route('central.pages.plans.index')
            ->with('success', 'Plan successfully updated');
    }

    public function destroy($id)
    {
        $plan = $this->repository->where('id', $id)->first();

        if (!$plan)
            return redirect()->back();


        $plan -> delete();

        return redirect()->back()->with('success', 'Plan successfully deleted');


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
