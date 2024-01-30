<?php

namespace App\Http\Controllers;

use App\Models\AnnualWorkPlan;
use App\Models\GovernmentInstitution;
use Illuminate\Http\Request;

class AnnualWorkPlanController extends Controller
{
    public function index(GovernmentInstitution $governmentInstitution)
    {
        $workPlans = $governmentInstitution->annualWorkPlans;
        return view('annual_work_plans.index', compact('governmentInstitution', 'workPlans'));
    }

    public function create(GovernmentInstitution $governmentInstitution)
    {
        return view('annual_work_plans.create', compact('governmentInstitution'));
    }

    public function store(Request $request, GovernmentInstitution $governmentInstitution)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'year' => 'required|numeric',
        ]);

        $workPlan = new AnnualWorkPlan($request->all());
        $governmentInstitution->annualWorkPlans()->save($workPlan);
        return redirect()->route('annual_work_plans.index', [$governmentInstitution])->with('success', 'Annual work plan created successfully.');
    }

    public function show(AnnualWorkPlan $workPlan)
    {
        return view('annual_work_plans.show', compact('workPlan'));
    }

    public function edit(AnnualWorkPlan $workPlan)
    {
        return view('annual_work_plans.edit', compact('workPlan'));
    }

    public function update(Request $request, AnnualWorkPlan $workPlan)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'year' => 'required|numeric',
        ]);

        $workPlan->update($request->all());
        return redirect()->route('annual_work_plans.index', [$workPlan->governmentInstitution])->with('success', 'Annual work plan updated successfully.');
    }

    public function destroy(AnnualWorkPlan $workPlan)
    {
        $workPlan->delete();
        return redirect()->route('annual_work_plans.index', [$workPlan->governmentInstitution])->with('success', 'Annual work plan deleted successfully.');
    }
}
