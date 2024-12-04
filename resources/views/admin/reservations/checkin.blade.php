@extends('layouts.admin')

@section('content')
    <h1>Check-In Guest</h1>

    <form action="{{ route('admin.reservations.checkin.store', $reservation->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <h4>Guest Details</h4>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="guest[name]" value="{{ old('guest.name', $reservation->guest->name ?? '') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea id="address" name="guest[address]" class="form-control" required>{{ old('guest.address', $reservation->guest->address ?? '') }}</textarea>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label for="city" class="form-label">City</label>
                <input type="text" id="city" name="guest[city]" value="{{ old('guest.city', $reservation->guest->city ?? '') }}" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="state" class="form-label">State</label>
                <input type="text" id="state" name="guest[state]" value="{{ old('guest.state', $reservation->guest->state ?? '') }}" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="country" class="form-label">Country</label>
                <input type="text" id="country" name="guest[country]" value="{{ old('guest.country', $reservation->guest->country ?? '') }}" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="mobile" class="form-label">Mobile</label>
            <input type="text" id="mobile" name="guest[mobile]" value="{{ old('guest.mobile', $reservation->guest->mobile ?? '') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="guest[email]" value="{{ old('guest.email', $reservation->guest->email ?? '') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="proof_type" class="form-label">Proof Type</label>
            <input type="text" id="proof_type" name="guest[proof_type]" value="{{ old('guest.proof_type', $reservation->guest->proof_type ?? '') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="proof_of_identification" class="form-label">Proof of Identification (Upload)</label>
            <input type="file" id="proof_of_identification" name="guest[proof_of_identification]" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Check-In</button>
    </form>
@endsection
