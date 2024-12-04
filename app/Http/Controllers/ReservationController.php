<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\RateType;
use App\Models\Room;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
  public function index()
{
    $reservations = Reservation::with(['guest', 'room', 'rateType'])->get();
   // dd($reservations);
    return view('admin.reservations.index', compact('reservations'));
}


    public function create()
    {
        $rateTypes = RateType::all();
        $rooms = Room::where('status', 'Available')->get();
        $proofTypes = ['Passport', 'Aadhar Card', 'Driver\'s License', 'Other'];
        return view('admin.reservations.create', compact('rateTypes', 'rooms', 'proofTypes'));
    }

   public function store(Request $request)
{
    // Validate the incoming data
    $validated = $request->validate([
        'arrival_date' => 'required|date|after_or_equal:today',
        'departure_date' => 'required|date|after:arrival_date',
        'rate_type_id' => 'required|exists:rate_types,id',
        'adults' => 'required|integer|min:1',
        'kids' => 'required|integer|min:0',
        'is_tax_inclusive' => 'required|boolean',
        'room_id' => 'required|exists:rooms,id',
        'guest.name' => 'required|string|max:255',
        'guest.mobile' => 'required|string|max:15',
        'guest.email' => 'required|email|max:255',
    ]);

    // Extract guest data from the request
    $guestData = $validated['guest'];

    // Save the guest to the database
    try {
        $guest = Guest::create([
            'name' => $guestData['name'],
            'mobile' => $guestData['mobile'],
            'email' => $guestData['email'],
        ]);
    } catch (\Exception $e) {
        // Log the error and return a friendly message
        \Log::error("Error creating guest: " . $e->getMessage());
        return redirect()->back()->withErrors(['guest' => 'Failed to create guest.']);
    }

    // After saving the guest, save the reservation
    try {
        $reservation = Reservation::create([
            'arrival_date' => $validated['arrival_date'],
            'departure_date' => $validated['departure_date'],
            'rate_type_id' => $validated['rate_type_id'],
            'adults' => $validated['adults'],
            'kids' => $validated['kids'],
            'is_tax_inclusive' => $validated['is_tax_inclusive'],
            'room_id' => $validated['room_id'],
            'guest_id' => $guest->id, // associate guest with the reservation
        ]);
    } catch (\Exception $e) {
        \Log::error("Error creating reservation: " . $e->getMessage());
        return redirect()->back()->withErrors(['reservation' => 'Failed to create reservation.']);
    }

    // Return success response
    return redirect()->route('admin.reservations.index')->with('success', 'Reservation created successfully!');
}


    public function destroy(Reservation $reservation)
{
    $reservation->delete();

    // Update room status to "Available"
    $reservation->room->update(['status' => 'Available']);

    return redirect()->route('admin.reservations.index')->with('success', 'Reservation deleted successfully!');
}
// Show the check-in form
public function checkInForm(Reservation $reservation)
{

    if ($reservation->status !== 'Reserved') {
        //return redirect()->route('admin.reservations.index')->withErrors('Check-in is only available for reserved reservations.');
    }

    return view('admin.reservations.checkin', compact('reservation'));
}

// Handle the check-in process
public function checkIn(Request $request, Reservation $reservation)
{
    $request->validate([
        'guest.name' => 'required|string|max:255',
        'guest.address' => 'required|string',
        'guest.city' => 'required|string|max:255',
        'guest.state' => 'required|string|max:255',
        'guest.country' => 'required|string|max:255',
        'guest.mobile' => 'required|string|max:15',
        'guest.email' => 'nullable|email|max:255',
        'guest.proof_type' => 'required|string|max:255',
        'guest.proof_of_identification' => 'nullable|image|max:2048',
    ]);

    // Update guest details
    $guest = $reservation->guest;
    $guest->update($request->input('guest'));

    if ($request->hasFile('guest.proof_of_identification')) {
        $path = $request->file('guest.proof_of_identification')->store('proofs', 'public');
        $guest->update(['proof_of_identification' => $path]);
    }

    // Update reservation and room status
    $reservation->update(['status' => 'Checked-In']);
    $reservation->room->update(['status' => 'Occupied']);

    return redirect()->route('admin.reservations.index')->with('success', 'Guest successfully checked in!');
}


}
