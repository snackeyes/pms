@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row g-4">
        <!-- Floors Card -->
        <div class="col-md-4">
            <div class="card text-white bg-primary h-100">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-building me-2"></i>Floors</h5>
                    <p class="card-text">Manage all floors in your property.</p>
                    <a href="{{ route('admin.floors.index') }}" class="btn btn-light btn-sm">View Details</a>
                </div>
            </div>
        </div>

        <!-- Room Types Card -->
        <div class="col-md-4">
            <div class="card text-white bg-success h-100">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-bed me-2"></i>Room Types</h5>
                    <p class="card-text">Define and manage room types.</p>
                    <a href="{{ route('admin.room-types.index') }}" class="btn btn-light btn-sm">View Details</a>
                </div>
            </div>
        </div>

        <!-- Taxes Card -->
        <div class="col-md-4">
            <div class="card text-white bg-warning h-100">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-file-invoice-dollar me-2"></i>Taxes</h5>
                    <p class="card-text">Set tax percentages and rules.</p>
                    <a href="{{ route('admin.taxes.index') }}" class="btn btn-light btn-sm">View Details</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
