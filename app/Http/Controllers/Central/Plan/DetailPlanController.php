<?php

namespace App\Http\Controllers\Central\Plan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Central\StoreUpdateDetailPlanRequest;
use App\Models\DetailPlan;
use App\Models\Plan;


class DetailPlanController extends Controller
{
    protected $repository ,$plans;

    public function __construct(DetailPlan $detailPlan, Plan $plans)
    {
      $this->repository = $detailPlan;
      $this->plans = $plans;
    }

    public function index($idPlan)
    {
        if(!$plans = $this->plans->where('id', $idPlan)->first()){
            return redirect()->back();
        }
        $details = $plans->details()->paginate(6);
        return view('central.pages.plans.details.index', compact('plans', 'details'));
    }

    public function create($idPlan)
    {
        if(!$plans = $this->plans->where('id', $idPlan)->first()){
            return redirect()->back();
        }
        return view('central.pages.plans.details.create', compact('plans'));
    }

    public function store(StoreUpdateDetailPlanRequest $request, $idPlan)
    {

        return redirect()->route('central.pages.plans.details.index', $plan->id)
            ->with('info', 'You are in the demo version. It is not possible to make a changes.');

    }

    public function edit($idPlan, $idDetail)
    {
        $plan = $this->plans->where('id', $idPlan)->first();
        $detail = $this->repository->find($idDetail);

        if(!$plan || !$detail){
            return redirect()->back();
        }
        return view('central.pages.plans.details.edit',
            compact('plan', 'detail')
        );


    }
    public function update(StoreUpdateDetailPlanRequest $request, $idPlan, $idDetail)
    {

        $plan = $this->plans->where('id', $idPlan)->first();
        $detail = $this->repository->find($idDetail);

        if(!$plan || !$detail){
            return redirect()->back();
        }
        return redirect()->route('central.pages.plans.details.index', $plan->id)
            ->with('info', 'You are in the demo version. It is not possible to make a changes.');


    }

    public function destroy($idPlan, $idDetail)
    {

        return redirect()->back()
            ->with('info', 'You are in the demo version. It is not possible to make a changes.');

    }

}
