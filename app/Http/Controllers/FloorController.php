<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    public function index()
    {
        $floors = Floor::all();
        return view('admin.floors.index', compact('floors'));
    }

    public function create()
    {
        return view('admin.floors.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'number' => 'required|integer|unique:floors,number',
    ]);

    // Create the floor record
    Floor::create([
        'name' => $request->input('name'),
        'number' => $request->input('number'),
    ]);

    return redirect()->route('admin.floors.index')->with('success', 'Floor created successfully.');
}

   public function edit(Floor $floor)
{
    return view('admin.floors.edit', [
        'floor' => $floor,
        'isEdit' => true,
    ]);
}

public function update(Request $request, Floor $floor)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $floor->update([
        'name' => $request->input('name'),
    ]);

    return redirect()->route('admin.floors.index')->with('success', 'Floor updated successfully.');
}


    public function destroy(Floor $floor)
    {
        $floor->delete();
        return redirect()->route('admin.floors.index')->with('success', 'Floor deleted successfully.');
    }
}
