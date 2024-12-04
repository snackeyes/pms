@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Create Settlement Type</h1>
        <form action="{{ route('admin.settlement-types.store') }}" method="POST">
            @csrf
            @include('partials._settlement_form', ['settlementType' => null])
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
@endsection
