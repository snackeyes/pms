{{-- resources/views/admin/taxes/edit.blade.php --}}
@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>Edit Tax</h1>
        <form action="{{ route('admin.taxes.update', $tax->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Tax Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $tax->name }}" required>
            </div>
            <div class="form-group">
                <label for="rate">Tax Rate (%)</label>
                <input type="number" id="rate" name="rate" class="form-control" value="{{ $tax->rate }}" required min="0" step="0.01">
            </div>
            <div class="form-group">
                <label for="type">Tax Type</label>
                <select id="type" name="type" class="form-control" required>
                    <option value="percentage" {{ $tax->type == 'percentage' ? 'selected' : '' }}>Percentage</option>
                    <option value="fixed" {{ $tax->type == 'fixed' ? 'selected' : '' }}>Fixed</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update Tax</button>
        </form>
    </div>
@endsection
