<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\GovernmentInstitution;
use App\Models\User;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index(GovernmentInstitution $governmentInstitution)
    {
        $boardMembers = $governmentInstitution->boards;
        return view('boards.index', compact('governmentInstitution', 'boardMembers'));
    }

    public function create(GovernmentInstitution $governmentInstitution)
    {
        $users = User::all();
        return view('boards.create', compact('governmentInstitution', 'users'));
    }

    public function store(Request $request, GovernmentInstitution $governmentInstitution)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $board = new Board($request->all());
        $board->government_institution_id = $governmentInstitution->id;
        $board->save();

        return redirect()->route('boards.index', [$governmentInstitution])->with('success', 'Board member created successfully.');
    }

    public function show(Board $board)
    {
        $user = $board->user;
        return view('boards.show', compact('board', 'user'));
    }

    public function edit(Board $board)
    {
        $users = User::all();
        return view('boards.edit', compact('board', 'users'));
    }

    public function update(Request $request, Board $board)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $board->update($request->all());
        return redirect()->route('boards.index', [$board->governmentInstitution])->with('success', 'Board member updated successfully.');
    }

    public function destroy(Board $boardMember)
    {
        $boardMember->delete();
        return redirect()->route('boards.index')->with('success', 'Board member deleted successfully.');
    }
}
