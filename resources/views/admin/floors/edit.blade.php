@php
    $title = isset($isEdit) ? "Edit Floor" : "Create Floor";
    $formAction = isset($isEdit) ? route('admin.floors.update', $floor->id) : route('admin.floors.store');
    $fields = [
        ['name' => 'name', 'label' => 'Name', 'type' => 'text', 'value' => $floor->name ?? '', 'required' => true],
        ['name' => 'number', 'label' => 'Floor Number', 'type' => 'number', 'value' => $floor->number ?? '', 'required' => true],
    ];
    $buttonText = isset($isEdit) ? 'Update' : 'Create';
@endphp

@extends('layouts.admin')
@section('content')
    @include('partials.form', ['title' => $title, 'formAction' => $formAction, 'fields' => $fields, 'buttonText' => $buttonText])
@endsection
