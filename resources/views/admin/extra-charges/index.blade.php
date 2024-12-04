@extends('layouts.admin')

@section('content')
    <h1>Extra Charges</h1>
    <a href="{{ route('admin.extra-charges.create') }}" class="btn btn-primary mb-3">Create Extra Charge</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Tax</th>
                <th>Rate</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($extraCharges as $extraCharge)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $extraCharge->name }}</td>
                    <td>{{ $extraCharge->description ?? 'N/A' }}</td>
                    <td>{{ $extraCharge->tax->name }} ({{ $extraCharge->tax->rate }}%)</td>
                    <td>{{ $extraCharge->rate }}</td>
                    <td>
                        <a href="{{ route('admin.extra-charges.edit', $extraCharge->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.extra-charges.destroy', $extraCharge->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">No Extra Charges found.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
