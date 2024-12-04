@php
    $title = isset($isEdit) ? "Edit Rate Type" : "Create Rate Type";
    $formAction = isset($isEdit) ? route('admin.rate-types.update', $rateType->id) : route('admin.rate-types.store');
    $fields = [
        ['name' => 'name', 'label' => 'Name', 'type' => 'text', 'value' => $rateType->name ?? '', 'required' => true],
        ['name' => 'rate', 'label' => 'Rate', 'type' => 'number', 'step' => '0.01', 'value' => $rateType->rate ?? '', 'required' => true],
        ['name' => 'description', 'label' => 'Description', 'type' => 'textarea', 'value' => $rateType->description ?? '', 'required' => false],
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
