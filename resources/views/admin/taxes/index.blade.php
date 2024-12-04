{{-- resources/views/admin/taxes/index.blade.php --}}
@extends('layouts.admin')
@section('content')
    @php
        $title = "Manage Taxes";
        $createRoute = route('admin.taxes.create');
        $headers = ['#', 'Name', 'Rate', 'Type', 'Actions'];
        $rows = $taxes->map(function($tax, $key) {
            return [
                'fields' => [
                    $key + 1,
                    $tax->name,
                    $tax->rate . '%',  // Assuming it's a percentage
                    ucfirst($tax->type),  // Type (Percentage or Fixed)
                ],
                'edit' => route('admin.taxes.edit', $tax->id),
                'delete' => route('admin.taxes.destroy', $tax->id),
            ];
        });
    @endphp
    @include('partials.table', [
        'title' => $title,
        'createRoute' => $createRoute,
        'headers' => $headers,
        'rows' => $rows,
    ])
@endsection
