@php
    $title = "Create Room Amenity";
    $formAction = route('admin.room-amenities.store');
    $fields = [
        ['name' => 'name', 'label' => 'Name', 'type' => 'text', 'value' => '', 'required' => true],
        ['name' => 'description', 'label' => 'Description', 'type' => 'textarea', 'value' => '', 'required' => false],
    ];
    $buttonText = "Create";
@endphp

@extends('layouts.admin')

@section('content')
    @include('partials.form', [
        'title' => $title,
        'formAction' => $formAction,
        'fields' => $fields,
        'buttonText' => $buttonText,
    ])
@endsection
