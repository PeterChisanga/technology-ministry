<?php

namespace App\Http\Controllers;

use App\Models\Mandate;
use Illuminate\Http\Request;

class MandateController extends Controller
{
    public function index()
    {
        $mandates = Mandate::all();
        return view('mandates.index', compact('mandates'));
    }

    public function show(Mandate $mandate)
    {
        return view('mandates.show', compact('mandate'));
    }

    public function create()
    {
        return view('mandates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'nullable|string|max:200',
            'duration' => 'required|string|max:50',
        ]);

        Mandate::create($request->all());

        return redirect()->route('mandates.index')->with('success', 'Mandate created successfully.');
    }

    public function edit(Mandate $mandate)
    {
        return view('mandates.edit', compact('mandate'));
    }

    public function update(Request $request, Mandate $mandate)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'nullable|string|max:200',
            'duration' => 'required|string|max:50',
        ]);

        $mandate->update($request->all());

        return redirect()->route('mandates.index')->with('success', 'Mandate updated successfully.');
    }

    public function destroy(Mandate $mandate)
    {
        $mandate->delete();

        return redirect()->route('mandates.index')->with('success', 'Mandate deleted successfully.');
    }
}
