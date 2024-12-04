<?php

namespace App\Http\Controllers;

use App\Models\RateType;
use Illuminate\Http\Request;

class RateTypeController extends Controller
{
   
    public function index()
    {
        $rateTypes = RateType::all();
        return view('admin.rate-types.index', compact('rateTypes'));
    }

    public function create()
    {
        return view('admin.rate-types.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'rate' => 'required|numeric|min:0',
        'description' => 'nullable|string',
    ]);

    RateType::create($request->all());

    return redirect()->route('admin.rate-types.index')->with('success', 'Rate Type created successfully.');
}

    public function edit(RateType $rateType)
    {
        return view('admin.rate-types.edit', [
            'rateType' => $rateType,
            'isEdit' => true,
        ]);
    }

    public function update(Request $request, RateType $rateType)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'rate' => 'required|numeric|min:0',
        'description' => 'nullable|string',
    ]);

    $rateType->update($request->all());

    return redirect()->route('admin.rate-types.index')->with('success', 'Rate Type updated successfully.');
}

    public function destroy(RateType $rateType)
    {
        $rateType->delete();
        return redirect()->route('admin.rate-types.index')->with('success', 'Rate Type deleted successfully.');
    }
}
