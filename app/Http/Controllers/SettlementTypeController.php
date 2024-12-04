<?php

namespace App\Http\Controllers;

use App\Models\SettlementType;
use Illuminate\Http\Request;

class SettlementTypeController extends Controller
{
    public function index()
    {
        $settlementTypes = SettlementType::all();
        return view('admin.settlement-types.index', compact('settlementTypes'));
    }

    public function create()
    {
        return view('admin.settlement-types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'payment_option' => 'required|in:none,credit_card,check,loyalty',
            'surcharge_amount' => 'nullable|numeric|min:0',
            'surcharge_percentage' => 'nullable|numeric|min:0|max:100',
        ]);

        SettlementType::create($request->all());
        return redirect()->route('admin.settlement-types.index')->with('success', 'Settlement Type created successfully.');
    }

    public function edit(SettlementType $settlementType)
    {
        return view('admin.settlement-types.edit', compact('settlementType'));
    }

    public function update(Request $request, SettlementType $settlementType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'payment_option' => 'required|in:none,credit_card,check,loyalty',
            'surcharge_amount' => 'nullable|numeric|min:0',
            'surcharge_percentage' => 'nullable|numeric|min:0|max:100',
        ]);

        $settlementType->update($request->all());
        return redirect()->route('admin.settlement-types.index')->with('success', 'Settlement Type updated successfully.');
    }

    public function destroy(SettlementType $settlementType)
    {
        $settlementType->delete();
        return redirect()->route('admin.settlement-types.index')->with('success', 'Settlement Type deleted successfully.');
    }
}
