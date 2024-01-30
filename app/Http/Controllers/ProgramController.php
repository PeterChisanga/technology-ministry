<?php

namespace App\Http\Controllers;

use App\Models\GovernmentInstitution;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index(GovernmentInstitution $governmentInstitution)
    {
        $programs = $governmentInstitution->programs;
        return view('programs.index', compact('governmentInstitution', 'programs'));
    }

    public function create(GovernmentInstitution $governmentInstitution)
    {
        return view('programs.create', compact('governmentInstitution'));
    }

    public function store(Request $request, GovernmentInstitution $governmentInstitution)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'nullable|string|max:200',
            'duration' => 'required|string|max:50',
        ]);

        $program = new Program($request->all());
        $program->government_institution_id = $governmentInstitution->id;
        $program->save();

        return redirect()->route('programs.index', [$governmentInstitution])->with('success', 'Program created successfully.');
    }

    public function show(Program $program)
    {
        $governmentInstitution = $program->governmentInstitution;
        return view('programs.show', compact('program','governmentInstitution'));
    }

    public function edit(Program $program)
    {
        return view('programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'nullable|string|max:200',
            'duration' => 'required|string|max:50',
        ]);

        $program->update($request->all());
        return redirect()->route('programs.index', [$program->governmentInstitution])->with('success', 'Program updated successfully.');
    }

    public function destroy(Program $program)
    {
        $governmentInstitution = $program->governmentInstitution;
        $program->delete();
        return redirect()->route('programs.index', [$governmentInstitution])->with('success', 'Program deleted successfully.');
    }
}
