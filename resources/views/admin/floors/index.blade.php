@php
    $title = "Manage Floors";
    $createRoute = route('admin.floors.create');
    $headers = ['#', 'Name'];
    $rows = $floors->map(function($floor, $key) {
        return [
            'fields' => [$key + 1, $floor->name],
            'edit' => route('admin.floors.edit', $floor->id),
            'delete' => route('admin.floors.destroy', $floor->id),
        ];
    });
@endphp

@extends('layouts.admin')
@section('content')
    @include('partials.table', ['title' => $title, 'createRoute' => $createRoute, 'headers' => $headers, 'rows' => $rows])
@endsection
