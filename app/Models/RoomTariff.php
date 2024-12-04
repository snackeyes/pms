<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomTariff extends Model
{
    protected $fillable = [
        'room_type_id',
        'rate_type_id',
        'tariff',
        'extra_adult',
        'extra_child',
    ];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function rateType()
    {
        return $this->belongsTo(RateType::class);
    }
}
