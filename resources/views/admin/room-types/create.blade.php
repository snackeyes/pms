@php
    $title = isset($isEdit) ? "Edit Room Type" : "Create Room Type";
    $formAction = isset($isEdit) ? route('admin.room-types.update', $roomType->id) : route('admin.room-types.store');
    $fields = [
        ['name' => 'name', 'label' => 'Name', 'type' => 'text', 'value' => $roomType->name ?? '', 'required' => true],
        ['name' => 'base_adult', 'label' => 'Base Adult', 'type' => 'number', 'value' => $roomType->base_adult ?? '', 'required' => true],
        ['name' => 'base_child', 'label' => 'Base Child', 'type' => 'number', 'value' => $roomType->base_child ?? '', 'required' => true],
        ['name' => 'max_adult', 'label' => 'Max Adult', 'type' => 'number', 'value' => $roomType->max_adult ?? '', 'required' => true],
        ['name' => 'max_child', 'label' => 'Max Child', 'type' => 'number', 'value' => $roomType->max_child ?? '', 'required' => true],
    ];
    $buttonText = isset($isEdit) ? 'Update' : 'Create';
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
