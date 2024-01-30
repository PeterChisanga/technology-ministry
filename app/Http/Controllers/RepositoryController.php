<?php
namespace App\Http\Controllers;

use App\Models\GovernmentInstitution;
use App\Models\Repository;
use Illuminate\Http\Request;

class RepositoryController extends Controller
{
    public function index(GovernmentInstitution $governmentInstitution)
    {
        $repositories = $governmentInstitution->repositories;
        return view('repositories.index', compact('governmentInstitution', 'repositories'));
    }

    public function create(GovernmentInstitution $governmentInstitution)
    {
        return view('repositories.create', compact('governmentInstitution'));
    }

    public function store(Request $request, GovernmentInstitution $governmentInstitution)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:200',
        ]);

        $repository = new Repository($request->all());
        $repository->government_institution_id = $governmentInstitution->id;
        $repository->save();

        return redirect()->route('repositories.index', [$governmentInstitution])->with('success', 'Repository created successfully.');
    }

    public function show(Repository $repository)
    {
        $governmentInstitution = $repository->governmentInstitution;
        return view('repositories.show', compact('repository', 'governmentInstitution'));
    }

    public function edit(Repository $repository)
    {
        $governmentInstitution = $repository->governmentInstitution;
        return view('repositories.edit', compact('repository','governmentInstitution'));
    }

    public function update(Request $request, Repository $repository)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:200',
        ]);

        $repository->update($request->all());
        return redirect()->route('repositories.index', [$repository->governmentInstitution])->with('success', 'Repository updated successfully.');
    }

    public function destroy(Repository $repository)
    {
        $repository->delete();
        return redirect()->route('repositories.index')->with('success', 'Repository deleted successfully.');
    }
}
