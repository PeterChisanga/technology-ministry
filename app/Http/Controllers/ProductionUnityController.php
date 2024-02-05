<?php

namespace App\Http\Controllers;

use App\Models\GovernmentInstitution;
use App\Models\ProductionUnity;
use Illuminate\Http\Request;

class ProductionUnityController extends Controller
{
    public function index(GovernmentInstitution $governmentInstitution)
    {
        $productionUnits = $governmentInstitution->productionUnits;
        return view('production_units.index', compact('governmentInstitution', 'productionUnits'));
    }

    public function show(ProductionUnity $productionUnity)
    {
        $governmentInstitution = $productionUnity->governmentInstitution;
        return view('production_units.show', compact('productionUnity', 'governmentInstitution'));
    }

    public function create(GovernmentInstitution $governmentInstitution)
    {
        return view('production_units.create', compact('governmentInstitution'));
    }

    public function store(Request $request, GovernmentInstitution $governmentInstitution)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'nullable|string|max:200',
            'capacity' => 'required|string|max:10',
            'duration' => 'required|string|max:50',
            'status' => 'required|string|max:50',
            'manager' => 'required|string|max:50',
        ]);

        $productionUnity = new ProductionUnity($request->all());
        $productionUnity->government_institution_id = $governmentInstitution->id;
        $productionUnity->save();

        return redirect()->route('production_units.index', [$governmentInstitution])->with('success', 'Production unit created successfully.');
    }

    public function edit(ProductionUnity $productionUnity)
    {
        return view('production_units.edit', compact('productionUnity'));
    }

    public function update(Request $request, ProductionUnity $productionUnity)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'nullable|string|max:200',
            'capacity' => 'required|string|max:10',
            'duration' => 'required|string|max:50',
            'status' => 'required|string|max:50',
            'manager' => 'required|string|max:50',
        ]);

        $productionUnity->update($request->all());
        return redirect()->route('production_units.index', [$productionUnity->governmentInstitution])->with('success', 'Production unit updated successfully.');
    }

    public function destroy(ProductionUnity $productionUnity)
    {
        $governmentInstitution = $productionUnity->governmentInstitution;
        $productionUnity->delete();

        return redirect()->route('production_units.index', [$governmentInstitution])->with('success', 'Production unit deleted successfully.');
    }
}
