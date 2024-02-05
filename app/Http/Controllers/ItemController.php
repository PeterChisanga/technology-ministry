<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create(Procurement $procurement)
    {
        return view('items.create', compact('procurement'));
    }

    public function store(Request $request, Procurement $procurement)
    {
        $request->validate([
            'name' => 'required|string|max:10',
            'cost' => 'required|numeric',
        ]);

        $item = new Item($request->all());
        $item->procurement_id = $procurement->id;
        $item->save();

        return redirect()->route('procurements.show', [$procurement])->with('success', 'Item created successfully.');
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required|string|max:10',
            'cost' => 'required|numeric',
        ]);

        $item->update($request->all());

        return redirect()->route('procurements.show', [$item->procurement])->with('success', 'Item updated successfully.');
    }

    public function destroy(Item $item)
    {
        $procurement = $item->procurement;
        $item->delete();

        return redirect()->route('procurements.show', [$procurement])->with('success', 'Item deleted successfully.');
    }
}
