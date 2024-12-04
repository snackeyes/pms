@php
    $title = "Manage Room Types";
    $createRoute = route('admin.room-types.create');
    $headers = ['#', 'Name', 'Base Adult', 'Base Child', 'Max Adult', 'Max Child'];
    $rows = $roomTypes->map(function($roomType, $key) {
        return [
            'fields' => [
                $key + 1,
                $roomType->name,
                $roomType->base_adult,
                $roomType->base_child,
                $roomType->max_adult,
                $roomType->max_child,
            ],
            'edit' => route('admin.room-types.edit', $roomType->id),
            'delete' => route('admin.room-types.destroy', $roomType->id),
        ];
    });
@endphp

@extends('layouts.admin')
@section('content')
    @include('partials.table', [
        'title' => $title,
        'createRoute' => $createRoute,
        'headers' => $headers,
        'rows' => $rows,
    ])
@endsection
