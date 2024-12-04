@extends('layouts.admin')

@section('content')
    <h1>Reservations</h1>

    <!-- Create Button -->
    <a href="{{ route('admin.reservations.create') }}" class="btn btn-primary mb-3">Create New Reservation</a>


    <!-- Reservations Table -->
    <table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Guest</th>
            <th>Room</th>
            <th>Arrival</th>
            <th>Departure</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $reservation->guest->name ?? 'N/A' }}</td>
                <td>{{ $reservation->room->name ?? 'N/A' }}</td>
                <td>{{ $reservation->arrival_date }}</td>
                <td>{{ $reservation->departure_date }}</td>
                <td>{{ $reservation->status }}</td>
                <td>
                    <!-- Check-In Button -->
                    @if ($reservation->status == 'Reserved')
                        <a href="{{ route('admin.reservations.checkin', $reservation->id) }}" class="btn btn-success btn-sm">
                            Check-In
                        </a>
                    @else
                        <span class="text-muted">Already Checked-In</span>
                    @endif

                    <!-- Edit and Delete Buttons -->
                    <a href="{{ route('admin.reservations.edit', $reservation->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
