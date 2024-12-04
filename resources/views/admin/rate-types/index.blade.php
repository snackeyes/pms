@php
    $title = "Manage Rate Types";
    $createRoute = route('admin.rate-types.create');
    $headers = ['#', 'Name', 'Description'];
    $rows = $rateTypes->map(function($rateType, $key) {
        return [
            'fields' => [
                $key + 1,
                $rateType->name,
                $rateType->description ?? 'N/A',
            ],
            'edit' => route('admin.rate-types.edit', $rateType->id),
            'delete' => route('admin.rate-types.destroy', $rateType->id),
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
