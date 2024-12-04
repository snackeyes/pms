<?php

namespace App\Http\Controllers;

use App\Models\RoomTariff;
use App\Models\RoomType;
use App\Models\RateType;
use Illuminate\Http\Request;

class RoomTariffController extends Controller
{
    public function index()
    {
        $roomTypes = RoomType::all();
        $rateTypes = RateType::all();
        
        // Retrieve existing tariffs
        $tariffs = RoomTariff::all()->keyBy(function ($tariff) {
            return $tariff->room_type_id . '-' . $tariff->rate_type_id;
        });

        return view('admin.room-tariffs.index', compact('roomTypes', 'rateTypes', 'tariffs'));
    }

    public function update(Request $request)
    {
        $data = $request->input('tariffs', []);

        foreach ($data as $key => $values) {
            list($roomTypeId, $rateTypeId) = explode('-', $key);

            RoomTariff::updateOrCreate(
                ['room_type_id' => $roomTypeId, 'rate_type_id' => $rateTypeId],
                [
                    'tariff' => $values['tariff'] ?? 0,
                    'extra_adult' => $values['extra_adult'] ?? 0,
                    'extra_child' => $values['extra_child'] ?? 0,
                ]
            );
        }

        return redirect()->route('admin.room-tariffs.index')->with('success', 'Room tariffs updated successfully.');
    }
}