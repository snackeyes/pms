@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit Settlement Type</h1>
        <form action="{{ route('admin.settlement-types.update', $settlementType->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('partials._settlement_form', ['settlementType' => $settlementType])
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
