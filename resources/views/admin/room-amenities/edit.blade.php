@php
    $title = "Edit Room Amenity";
    $formAction = route('admin.room-amenities.update', $roomAmenity->id);
    $fields = [
        ['name' => 'name', 'label' => 'Name', 'type' => 'text', 'value' => $roomAmenity->name, 'required' => true],
        ['name' => 'description', 'label' => 'Description', 'type' => 'textarea', 'value' => $roomAmenity->description, 'required' => false],
    ];
    $buttonText = "Update";
    $isEdit = true; // Ensure this variable is set
@endphp

@extends('layouts.admin')

@section('content')
    @include('partials.form', [
        'title' => $title,
        'formAction' => $formAction,
        'fields' => $fields,
        'buttonText' => $buttonText,
        'isEdit' => $isEdit, // Pass it explicitly
    ])
@endsection
