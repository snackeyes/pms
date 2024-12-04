@extends('layouts.admin')

@section('content')
    <div class="container">
        <a href="{{ route('admin.settlement-types.create') }}" class="btn btn-primary mb-3">Add Settlement Type</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Payment Option</th>
                    <th>Surcharge Amount</th>
                    <th>Surcharge Percentage</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($settlementTypes as $type)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $type->name }}</td>
                        <td>{{ ucfirst(str_replace('_', ' ', $type->payment_option)) }}</td>
                        <td>{{ $type->surcharge_amount }}</td>
                        <td>{{ $type->surcharge_percentage }}%</td>
                        <td>
                            <a href="{{ route('admin.settlement-types.edit', $type->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.settlement-types.destroy', $type->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
