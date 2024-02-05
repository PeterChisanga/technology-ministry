<?php

namespace App\Http\Controllers;

use App\Models\GovernmentInstitution;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(GovernmentInstitution $governmentInstitution)
    {
        $projects = $governmentInstitution->projects;
        return view('projects.index', compact('governmentInstitution', 'projects'));
    }

    public function create(GovernmentInstitution $governmentInstitution)
    {
        return view('projects.create', compact('governmentInstitution'));
    }

    public function store(Request $request, GovernmentInstitution $governmentInstitution)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'cost' => 'required|numeric',
            'project_manager' => 'required',
            'start_date' => 'required|date',
            'duration' => 'required|integer',
            'stop_date' => 'nullable|date',
        ]);

        $project = new Project($request->all());
        $project->government_institution_id = $governmentInstitution->id;
        $project->save();

        return redirect()->route('projects.index', [$governmentInstitution])->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        $governmentInstitution = $project->governmentInstitution;
        return view('projects.show', compact('project','governmentInstitution'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'cost' => 'required|numeric',
            'project_manager' => 'required',
            'start_date' => 'required|date',
            'duration' => 'required|integer',
            'stop_date' => 'nullable|date',
        ]);

        $project->update($request->all());
        return redirect()->route('projects.index', [$project->governmentInstitution])->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
