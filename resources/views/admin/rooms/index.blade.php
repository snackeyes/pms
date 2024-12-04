@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Rooms List</h4>
            <a href="{{ route('admin.rooms.create') }}" class="btn btn-primary float-end">Add Room</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Room Type</th>
                        <th>Floor</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rooms as $key => $room)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $room->name }}</td>
                            <td>{{ $room->roomType->name ?? 'N/A' }}</td>
                            <td>{{ $room->floor->name ?? 'N/A' }}</td>
                            <td>{{ $room->status }}</td>
                            <td>
                                <a href="{{ route('admin.rooms.edit', $room->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No rooms available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
