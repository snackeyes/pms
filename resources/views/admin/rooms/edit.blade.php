@extends('layouts.admin')

@section('content')
            <div class="card-body">
                <form action="{{ route('admin.rooms.update', $room->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    {{-- Include the reusable form partial --}}
                    @include('partials._room_form', [
                        'room' => $room,
                        'roomTypes' => $roomTypes,
                        'floors' => $floors,
                        'amenities' => $amenities,
                    ])
                </form>
            </div>
@endsection
