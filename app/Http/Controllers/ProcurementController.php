<?php

namespace App\Http\Controllers;

use App\Models\Procurement;
use Illuminate\Http\Request;

class ProcurementController extends Controller
{
    public function index(Department $department)
    {
        $procurements = $department->procurements;
        return view('procurements.index', compact('department', 'procurements'));
    }

    public function show(Procurement $procurement)
    {
        return view('procurements.show', compact('procurement'));
    }

    public function create(Department $department)
    {
        return view('procurements.create', compact('department'));
    }

    public function store(Request $request, Department $department)
    {
        $request->validate([
            'total_cost' => 'required|numeric',
            'supplier' => 'required|string|max:50',
            'status' => 'required|string|max:50',
        ]);

        $procurement = new Procurement($request->all());
        $procurement->department_id = $department->id;
        $procurement->save();

        return redirect()->route('procurements.index', [$department])->with('success', 'Procurement created successfully.');
    }

    public function edit(Procurement $procurement)
    {
        return view('procurements.edit', compact('procurement'));
    }

    public function update(Request $request, Procurement $procurement)
    {
        $request->validate([
            'total_cost' => 'required|numeric',
            'supplier' => 'required|string|max:50',
            'status' => 'required|string|max:50',
        ]);

        $procurement->update($request->all());

        return redirect()->route('procurements.index', [$procurement->department])->with('success', 'Procurement updated successfully.');
    }

    public function destroy(Procurement $procurement)
    {
        $procurement->delete();

        return redirect()->route('procurements.index', [$procurement->department])->with('success', 'Procurement deleted successfully.');
    }
}
