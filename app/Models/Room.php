<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
     use HasFactory;

    protected $fillable = [
        'name', 'room_type_id', 'floor_id', 'room_amenities', 'key_card_no', 'phone_no', 'status',
    ];

    protected $casts = [
        'room_amenities' => 'array', // Cast to array when retrieving
    ];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }

    public function amenities()
{
    return $this->belongsToMany(RoomAmenity::class, 'room_amenity_room', 'room_id', 'room_amenity_id');
}

}
