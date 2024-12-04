@extends('layouts.admin')

@section('content')
    <h1>{{ isset($extraCharge) ? 'Edit Extra Charge' : 'Create Extra Charge' }}</h1>
    <form action="{{ isset($extraCharge) ? route('admin.extra-charges.update', $extraCharge->id) : route('admin.extra-charges.store') }}" method="POST">
        @csrf
        @if(isset($extraCharge)) @method('PUT') @endif

        @include('partials._extra_charge_form', ['extraCharge' => $extraCharge ?? null, 'taxes' => $taxes])

        <button type="submit" class="btn btn-success">{{ isset($extraCharge) ? 'Update' : 'Create' }}</button>
    </form>
@endsection
