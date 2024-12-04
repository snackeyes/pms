<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
     public function index()
    {
        $roomTypes = RoomType::all();
        return view('admin.room-types.index', compact('roomTypes'));
    }

    public function create()
    {
        return view('admin.room-types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'base_adult' => 'required|integer|min:0',
            'base_child' => 'required|integer|min:0',
            'max_adult' => 'required|integer|min:0',
            'max_child' => 'required|integer|min:0',
        ]);

        RoomType::create($request->all());

        return redirect()->route('admin.room-types.index')->with('success', 'Room Type created successfully.');
    }

    public function edit(RoomType $roomType)
    {
        return view('admin.room-types.edit', [
            'roomType' => $roomType,
            'isEdit' => true,
        ]);
    }

    public function update(Request $request, RoomType $roomType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'base_adult' => 'required|integer|min:0',
            'base_child' => 'required|integer|min:0',
            'max_adult' => 'required|integer|min:0',
            'max_child' => 'required|integer|min:0',
        ]);

        $roomType->update($request->all());

        return redirect()->route('admin.room-types.index')->with('success', 'Room Type updated successfully.');
    }

    public function destroy(RoomType $roomType)
    {
        $roomType->delete();
        return redirect()->route('admin.room-types.index')->with('success', 'Room Type deleted successfully.');
    }
}