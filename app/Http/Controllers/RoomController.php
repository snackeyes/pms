<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use App\Models\Floor;
use App\Models\RoomAmenity;
use Illuminate\Http\Request;

class RoomController extends Controller
{
      public function index()
{
    $rooms = Room::with(['roomType', 'floor'])->get(['id', 'name', 'room_type_id', 'floor_id', 'status']);
    return view('admin.rooms.index', compact('rooms'));
}


      public function create()
    {
        $roomTypes = RoomType::all();
    $floors = Floor::all();
    $amenities = RoomAmenity::all();


    return view('admin.rooms.create', [
    'formAction' => route('admin.rooms.store'),
    'roomTypes' => $roomTypes,
    'floors' => $floors,
    'amenities' => $amenities,
    'buttonText' => 'Create Room',
    'isEdit' => false,
]);
}

   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'room_type_id' => 'required|exists:room_types,id',
        'floor_id' => 'required|exists:floors,id',
        'key_card_no' => 'required|string|max:255',
        'phone_no' => 'required|string|max:255',
        'status' => 'required|in:Available,Occupied,Out of Service',
        'amenities' => 'nullable|array',
        'amenities.*' => 'exists:room_amenities,id',
    ]);

    $room = Room::create($request->except('amenities'));

    if ($request->has('amenities')) {
        $room->amenities()->attach($request->input('amenities'));
    }

    return redirect()->route('admin.rooms.index')->with('success', 'Room created successfully.');
}

    public function edit(Room $room)
    {
        $roomTypes = RoomType::all();
        $floors = Floor::all();
        $amenities = RoomAmenity::all();
        return view('admin.rooms.edit', [
    'formAction' => route('admin.rooms.update', $room->id),
    'room' => $room,
    'roomTypes' => $roomTypes,
    'floors' => $floors,
    'amenities' => $amenities,
    'buttonText' => 'Update Room',
    'isEdit' => true,
]);
}

    public function update(Request $request, Room $room)
{
    // Validate the incoming request
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'room_type_id' => 'required|exists:room_types,id',
        'floor_id' => 'required|exists:floors,id',
        'amenities' => 'array',
        'amenities.*' => 'exists:room_amenities,id',
        'key_card_no' => 'required|string|max:255|unique:rooms,key_card_no,' . $room->id,
        'phone_no' => 'required|string|max:255',
        'status' => 'required|in:Available,Occupied,Out of Service',
    ]);

    // Update room details
    $room->update([
        'name' => $validatedData['name'],
        'room_type_id' => $validatedData['room_type_id'],
        'floor_id' => $validatedData['floor_id'],
        'key_card_no' => $validatedData['key_card_no'],
        'phone_no' => $validatedData['phone_no'],
        'status' => $validatedData['status'],
    ]);

    // Sync the room amenities
    $room->amenities()->sync($validatedData['amenities'] ?? []);

    // Redirect with success message
    return redirect()->route('admin.rooms.index')->with('success', 'Room updated successfully.');
}

    public function destroy(Room $room)
{
    try {
        // Detach amenities from the pivot table
        $room->amenities()->detach();

        // Delete the room itself
        $room->delete();

        return redirect()->route('admin.rooms.index')->with('success', 'Room deleted successfully.');
    } catch (\Exception $e) {
        return redirect()->route('admin.rooms.index')->with('error', 'Failed to delete the room. Please try again.');
    }
}

}
