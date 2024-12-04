<?php

namespace App\Http\Controllers;

use App\Models\ExtraCharge;
use App\Models\Tax;
use Illuminate\Http\Request;

class ExtraChargeController extends Controller
{
     public function index()
    {
        $extraCharges = ExtraCharge::with('tax')->get();
        return view('admin.extra-charges.index', compact('extraCharges'));
    }

    public function create()
    {
        $taxes = Tax::all();
        return view('admin.extra-charges.create', compact('taxes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'tax_id' => 'required|exists:taxes,id',
            'rate' => 'required|numeric|min:0',
        ]);

        ExtraCharge::create($request->all());
        return redirect()->route('admin.extra-charges.index')->with('success', 'Extra Charge created successfully.');
    }

    public function edit(ExtraCharge $extraCharge)
    {
        $taxes = Tax::all();
        return view('admin.extra-charges.edit', compact('extraCharge', 'taxes'));
    }

    public function update(Request $request, ExtraCharge $extraCharge)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'tax_id' => 'required|exists:taxes,id',
            'rate' => 'required|numeric|min:0',
        ]);

        $extraCharge->update($request->all());
        return redirect()->route('admin.extra-charges.index')->with('success', 'Extra Charge updated successfully.');
    }

    public function destroy(ExtraCharge $extraCharge)
    {
        $extraCharge->delete();
        return redirect()->route('admin.extra-charges.index')->with('success', 'Extra Charge deleted successfully.');
    }

}
