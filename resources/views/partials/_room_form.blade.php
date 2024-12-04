<div class="card mt-4">
    <div class="card-header">
        <h4>{{ isset($isEdit) && $isEdit ? 'Edit Room' : 'Create Room' }}</h4>
    </div>
    <div class="card-body">
        <form action="{{ $formAction }}" method="POST">
            @csrf
            @if(isset($isEdit) && $isEdit)
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="name" class="form-label">Room Name</label>
                <input type="text" id="name" name="name" 
                       value="{{ old('name', $room->name ?? '') }}" 
                       class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="room_type_id" class="form-label">Room Type</label>
                <select id="room_type_id" name="room_type_id" class="form-control" required>
                    <option value="">Select Room Type</option>
                    @foreach($roomTypes as $type)
                        <option value="{{ $type->id }}" 
                                {{ old('room_type_id', $room->room_type_id ?? '') == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="floor_id" class="form-label">Floor</label>
                <select id="floor_id" name="floor_id" class="form-control" required>
                    <option value="">Select Floor</option>
                    @foreach($floors as $floor)
                        <option value="{{ $floor->id }}" 
                                {{ old('floor_id', $room->floor_id ?? '') == $floor->id ? 'selected' : '' }}>
                            {{ $floor->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="amenities" class="form-label">Amenities</label>
                <select id="amenities" name="amenities[]" class="form-control" multiple>
                    @foreach($amenities as $amenity)
                        <option value="{{ $amenity->id }}" 
                                {{ collect(old('amenities', $room->amenities->pluck('id') ?? []))->contains($amenity->id) ? 'selected' : '' }}>
                            {{ $amenity->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="key_card_no" class="form-label">Key Card Number</label>
                <input type="text" id="key_card_no" name="key_card_no" 
                       value="{{ old('key_card_no', $room->key_card_no ?? '') }}" 
                       class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="phone_no" class="form-label">Phone Number</label>
                <input type="text" id="phone_no" name="phone_no" 
                       value="{{ old('phone_no', $room->phone_no ?? '') }}" 
                       class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="Available" 
                            {{ old('status', $room->status ?? '') == 'Available' ? 'selected' : '' }}>Available</option>
                    <option value="Occupied" 
                            {{ old('status', $room->status ?? '') == 'Occupied' ? 'selected' : '' }}>Occupied</option>
                    <option value="Out of Service" 
                            {{ old('status', $room->status ?? '') == 'Out of Service' ? 'selected' : '' }}>Out of Service</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">{{ isset($isEdit) && $isEdit ? 'Update Room' : 'Create Room' }}</button>
        </form>
    </div>
</div>
