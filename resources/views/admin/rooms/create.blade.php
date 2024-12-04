@extends('layouts.admin')

@section('content')
    @php
        $title = 'Create Room';
        $formAction = route('admin.rooms.store');
        $isEdit = false;
        $buttonText = 'Create Room';
    @endphp

    @include('partials._room_form', [
        'title' => $title,
        'formAction' => $formAction,
        'buttonText' => $buttonText,
        'isEdit' => $isEdit,
        'roomTypes' => $roomTypes,
        'floors' => $floors,
        'amenities' => $amenities,
        'room' => null,
    ])
@endsection
