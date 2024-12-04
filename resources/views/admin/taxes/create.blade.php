{{-- resources/views/admin/taxes/create.blade.php --}}
@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>Create Tax</h1>
        <form action="{{ route('admin.taxes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Tax Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="rate">Tax Rate (%)</label>
                <input type="number" id="rate" name="rate" class="form-control" required min="0" step="0.01">
            </div>
            <div class="form-group">
                <label for="type">Tax Type</label>
                <select id="type" name="type" class="form-control" required>
                    <option value="percentage">Percentage</option>
                    <option value="fixed">Fixed</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Save Tax</button>
        </form>
    </div>
@endsection
