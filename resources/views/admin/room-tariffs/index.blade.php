@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1>Manage Room Tariffs</h1>
    <form action="{{ route('admin.room-tariffs.update') }}" method="POST">
        @csrf
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Room Type</th>
                    <th>Rate Type</th>
                    <th>Tariff</th>
                    <th>Extra Adult</th>
                    <th>Extra Child</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roomTypes as $roomType)
                    @foreach ($rateTypes as $rateType)
                        @php
                            $key = $roomType->id . '-' . $rateType->id;
                            $tariff = $tariffs[$key] ?? null;
                        @endphp
                        <tr>
                            <td>{{ $roomType->name }}</td>
                            <td>{{ $rateType->name }}</td>
                            <td>
                                <input type="number" step="0.01" name="tariffs[{{ $key }}][tariff]" class="form-control" 
                                       value="{{ $tariff->tariff ?? '0.00' }}">
                            </td>
                            <td>
                                <input type="number" step="0.01" name="tariffs[{{ $key }}][extra_adult]" class="form-control" 
                                       value="{{ $tariff->extra_adult ?? '0.00' }}">
                            </td>
                            <td>
                                <input type="number" step="0.01" name="tariffs[{{ $key }}][extra_child]" class="form-control" 
                                       value="{{ $tariff->extra_child ?? '0.00' }}">
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="#" class="btn btn-secondary">Close</a>
        </div>
    </form>
</div>
@endsection
