<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
   public function index()
    {
        $title = 'Manage Taxes';
        $createRoute = route('admin.taxes.create');
        $headers = ['#', 'Name', 'Rate', 'Type', 'Actions'];

        // Get all taxes from the database
        $taxes = Tax::all();
        $rows = $taxes->map(function($tax, $key) {
            return [
                'fields' => [
                    $key + 1,
                    $tax->name,
                    $tax->rate . '%',  // Assuming it's a percentage
                    ucfirst($tax->type),  // Type (Percentage or Fixed)
                ],
                'edit' => route('admin.taxes.edit', $tax->id),
                'delete' => route('admin.taxes.destroy', $tax->id),
            ];
        });

        return view('admin.taxes.index', compact('title', 'createRoute', 'headers', 'rows', 'taxes'));
    }

    // Show the form to create a new tax
    public function create()
    {
        return view('admin.taxes.create');
    }

    // Store a new tax
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'rate' => 'required|numeric|min:0',
            'type' => 'required|in:percentage,fixed',
        ]);

        Tax::create($request->all());

        return redirect()->route('admin.taxes.index')->with('success', 'Tax created successfully.');
    }

    // Show the form to edit an existing tax
    public function edit(Tax $tax)
    {
        return view('admin.taxes.edit', compact('tax'));
    }

    // Update an existing tax
    public function update(Request $request, Tax $tax)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'rate' => 'required|numeric|min:0',
            'type' => 'required|in:percentage,fixed',
        ]);

        $tax->update($request->all());

        return redirect()->route('admin.taxes.index')->with('success', 'Tax updated successfully.');
    }

    // Delete a tax
    public function destroy(Tax $tax)
    {
        $tax->delete();

        return redirect()->route('admin.taxes.index')->with('success', 'Tax deleted successfully.');
    }
}