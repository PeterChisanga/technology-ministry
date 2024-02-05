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

    public function show(AnnualWorkPlan $annualWorkPlan)
    {
        $governmentInstitution = $annualWorkPlan->governmentInstitution;
        return view('annual_work_plans.show', compact('annualWorkPlan','governmentInstitution'));
    }

    public function edit(AnnualWorkPlan $annualWorkPlan)
    {
        return view('annual_work_plans.edit', compact('annualWorkPlan'));
    }

    public function update(Request $request, AnnualWorkPlan $annualWorkPlan)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'year' => 'required|numeric',
        ]);

        $annualWorkPlan->update($request->all());
        return redirect()->route('annual_work_plans.index', [$annualWorkPlan->governmentInstitution])->with('success', 'Annual work plan updated successfully.');
    }

    public function destroy(AnnualWorkPlan $annualWorkPlan)
    {
        $annualWorkPlan->delete();
        return redirect()->route('annual_work_plans.index', [$annualWorkPlan->governmentInstitution])->with('success', 'Annual work plan deleted successfully.');
    }
}
