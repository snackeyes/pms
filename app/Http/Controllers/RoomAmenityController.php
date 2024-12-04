<?php

namespace App\Http\Controllers;

use App\Models\RoomAmenity;
use Illuminate\Http\Request;

class RoomAmenityController extends Controller
{
     public function index()
    {
        $title = 'Manage Room Amenities';
        $createRoute = route('admin.room-amenities.create');
        $headers = ['#', 'Name', 'Description', 'Actions'];

        $roomAmenities = RoomAmenity::all();
        $rows = $roomAmenities->map(function ($amenity, $key) {
            return [
                'fields' => [
                    $key + 1,
                    $amenity->name,
                    $amenity->description ?? 'N/A',
                ],
                'edit' => route('admin.room-amenities.edit', $amenity->id),
                'delete' => route('admin.room-amenities.destroy', $amenity->id),
            ];
        });

        return view('admin.room-amenities.index', compact('title', 'createRoute', 'headers', 'rows'));
    }

    public function create()
    {
        $title = 'Create Room Amenity';
        $formAction = route('admin.room-amenities.store');
        $fields = [
            ['name' => 'name', 'label' => 'Name', 'type' => 'text', 'value' => '', 'required' => true],
            ['name' => 'description', 'label' => 'Description', 'type' => 'textarea', 'value' => '', 'required' => false],
        ];
        $buttonText = 'Create';

        return view('admin.room-amenities.create', compact('title', 'formAction', 'fields', 'buttonText'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        RoomAmenity::create($request->only('name', 'description'));

        return redirect()->route('admin.room-amenities.index')->with('success', 'Room Amenity created successfully.');
    }

   public function edit(RoomAmenity $roomAmenity)
{
    $title = 'Edit Room Amenity';
    $formAction = route('admin.room-amenities.update', $roomAmenity->id);
    $fields = [
        ['name' => 'name', 'label' => 'Name', 'type' => 'text', 'value' => $roomAmenity->name, 'required' => true],
        ['name' => 'description', 'label' => 'Description', 'type' => 'textarea', 'value' => $roomAmenity->description, 'required' => false],
    ];
    $buttonText = 'Update';
    $isEdit = true; // Define the variable here

    return view('admin.room-amenities.edit', compact('title', 'formAction', 'fields', 'buttonText', 'isEdit','roomAmenity'));
}


    public function update(Request $request, RoomAmenity $roomAmenity)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $roomAmenity->update($request->only('name', 'description'));

        return redirect()->route('admin.room-amenities.index')->with('success', 'Room Amenity updated successfully.');
    }

    public function destroy(RoomAmenity $roomAmenity)
    {
        $roomAmenity->delete();

        return redirect()->route('admin.room-amenities.index')->with('success', 'Room Amenity deleted successfully.');
    }
}
