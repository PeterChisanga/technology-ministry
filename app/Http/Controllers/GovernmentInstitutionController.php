<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GovernmentInstitution;

class GovernmentInstitutionController extends Controller
{
    public function index()
    {
        $governmentInstitutions = GovernmentInstitution::all();
        return view('government_institutions.index', compact('governmentInstitutions'));
    }

    public function create()
    {
        return view('government_institutions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:government_institutions|max:200',
            'category' => 'required|string|max:50',
        ]);

        GovernmentInstitution::create($request->all());

        return redirect()->route('government-institutions.index')
            ->with('success', 'Government institution created successfully.');
    }

    public function show(GovernmentInstitution $governmentInstitution)
    {
        return view('government_institutions.show', compact('governmentInstitution'));
    }

    public function edit(){
        echo 'Edit blade';
    }

    // public function edit(GovernmentInstitution $governmentInstitution)
    // {
    //     return view('government_institutions.edit', compact('governmentInstitution'));
    // }

    public function update(Request $request, GovernmentInstitution $governmentInstitution)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'category' => 'required|string|max:50',
        ]);

        $governmentInstitution->update($request->all());

        return redirect()->route('government-institutions.index')
            ->with('success', 'Government institution updated successfully.');
    }


    public function destroy(GovernmentInstitution $governmentInstitution)
    {
        $governmentInstitution->delete();

        return redirect()->route('government-institutions.index')
            ->with('success', 'Government institution deleted successfully.');
    }
}
