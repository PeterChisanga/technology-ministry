<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hr;
use App\Models\User;
use App\Models\GovernmentInstitution;

class HrController extends Controller
{
    public function index(GovernmentInstitution $governmentInstitution)
    {
        $hrPersonnel = $governmentInstitution->hr;
        return view('hr.index', compact('governmentInstitution', 'hrPersonnel'));
    }

    public function show(Hr $hrPersonnel)
    {
        return view('hr.show', compact('hrPersonnel'));
    }

    public function create(GovernmentInstitution $governmentInstitution)
    {
        $users = User::all(); // You may adjust this based on your user structure
        return view('hr.create', compact('governmentInstitution', 'users'));
    }

    public function store(Request $request, GovernmentInstitution $governmentInstitution)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $hrPersonnel = new Hr($request->all());
        $governmentInstitution->hr()->save($hrPersonnel);
        
        return redirect()->route('hr.index', [$governmentInstitution])
            ->with('success', 'HR personnel created successfully.');
    }

    public function edit(Hr $hrPersonnel)
    {
        $users = User::all(); // You may adjust this based on your user structure
        return view('hr.edit', compact('hrPersonnel', 'users'));
    }

    public function update(Request $request, Hr $hrPersonnel)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $hrPersonnel->update($request->all());

        return redirect()->route('hr.index', [$hrPersonnel->governmentInstitution])
            ->with('success', 'HR personnel updated successfully.');
    }

    public function destroy(Hr $hrPersonnel)
    {
        $governmentInstitution = $hrPersonnel->governmentInstitution;
        $hrPersonnel->delete();

        return redirect()->route('hr.index', [$governmentInstitution])
            ->with('success', 'HR personnel deleted successfully.');
    }
}
