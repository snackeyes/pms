@extends('layouts.admin')

@section('content')
    @include('partials.table', [
        'title' => $title,
        'createRoute' => $createRoute,
        'headers' => $headers,
        'rows' => $rows,
    ])
@endsection
