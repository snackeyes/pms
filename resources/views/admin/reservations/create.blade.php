@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h4>Create Reservation</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.reservations.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    {{-- Guest Details --}}
                    <h5>Guest Details</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="guest_name" class="form-label">Guest Name</label>
                                <input type="text" id="guest_name" name="guest[name]" 
                                       value="{{ old('guest.name') }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="guest_mobile" class="form-label">Mobile</label>
                                <input type="text" id="guest_mobile" name="guest[mobile]" 
                                       value="{{ old('guest.mobile') }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="guest_email" class="form-label">Email</label>
                                <input type="email" id="guest_email" name="guest[email]" 
                                       value="{{ old('guest.email') }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="guest_proof_type" class="form-label">Proof Type</label>
                                <select id="guest_proof_type" name="guest[proof_type]" class="form-control">
                                    <option value="">Select Proof Type</option>
                                    <option value="Passport" {{ old('guest.proof_type') == 'Passport' ? 'selected' : '' }}>Passport</option>
                                    <option value="Aadhar Card" {{ old('guest.proof_type') == 'Aadhar Card' ? 'selected' : '' }}>Aadhar Card</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="guest_proof" class="form-label">Proof of Identification</label>
                                <input type="file" id="guest_proof" name="guest[proof_of_identification]" 
                                       class="form-control">
                            </div>
                        </div>
                    </div>

                    <hr>
                    
                    {{-- Reservation Details --}}
                    <h5>Reservation Details</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="arrival_date" class="form-label">Arrival Date</label>
                                <input type="date" id="arrival_date" name="arrival_date" 
                                       value="{{ old('arrival_date') }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="departure_date" class="form-label">Departure Date</label>
                                <input type="date" id="departure_date" name="departure_date" 
                                       value="{{ old('departure_date') }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="rate_type_id" class="form-label">Rate Type</label>
                                <select id="rate_type_id" name="rate_type_id" class="form-control" required>
                                    <option value="">Select Rate Type</option>
                                    @foreach($rateTypes as $rateType)
                                        <option value="{{ $rateType->id }}" 
                                                {{ old('rate_type_id') == $rateType->id ? 'selected' : '' }}>
                                            {{ $rateType->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="adults" class="form-label">Adults</label>
                                <input type="number" id="adults" name="adults" 
                                       value="{{ old('adults') }}" class="form-control" required min="1">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="kids" class="form-label">Kids</label>
                                <input type="number" id="kids" name="kids" 
                                       value="{{ old('kids') }}" class="form-control" min="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="is_tax_inclusive" class="form-label">Tax Inclusive?</label>
                                <select id="is_tax_inclusive" name="is_tax_inclusive" class="form-control" required>
                                    <option value="1" {{ old('is_tax_inclusive') == '1' ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ old('is_tax_inclusive') == '0' ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="room_id" class="form-label">Room</label>
                                <select id="room_id" name="room_id" class="form-control" required>
                                    <option value="">Select Room</option>
                                    @foreach($rooms as $room)
                                        @if($room->status == 'Available')
                                            <option value="{{ $room->id }}" 
                                                    {{ old('room_id') == $room->id ? 'selected' : '' }}>
                                                {{ $room->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Create Reservation</button>
                </form>
            </div>
        </div>
    </div>
@endsection
