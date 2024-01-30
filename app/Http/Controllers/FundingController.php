<?php 
namespace App\Http\Controllers;

use App\Models\Funding;
use App\Models\Project;
use Illuminate\Http\Request;

class FundingController extends Controller
{
    public function index(Project $project)
    {
        $funding = $project->funding;
        return view('funding.index', compact('project', 'funding'));
    }

    public function show(Funding $funding)
    {
        $project = $funding->project;
        return view('funding.show', compact('funding', 'project'));
    }

    public function store(Request $request, Project $project)
    {
        $request->validate([
            'funder' => 'required|string|max:50',
            'cost' => 'required|numeric',
            'description' => 'required|string|max:200',
        ]);

        $funding = new Funding($request->all());
        $funding->project_id = $project->id;
        $funding->government_institution_id = $project->government_institution_id;
        $funding->save();

        return redirect()->route('funding.index', [$project])->with('success', 'Funding source created successfully.');
    }

    public function edit(Funding $funding)
    {
        $project = $funding->project;
        return view('funding.edit', compact('funding', 'project'));
    }

    public function update(Request $request, Funding $funding)
    {
        $request->validate([
            'funder' => 'required|string|max:50',
            'cost' => 'required|numeric',
            'description' => 'required|string|max:200',
        ]);

        $funding->update($request->all());
        return redirect()->route('funding.index', [$funding->project])->with('success', 'Funding source updated successfully.');
    }

    public function destroy(Funding $funding)
    {
        $project = $funding->project;
        $funding->delete();
        return redirect()->route('funding.index', [$project])->with('success', 'Funding source deleted successfully.');
    }
}
