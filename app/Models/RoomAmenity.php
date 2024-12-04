<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomAmenity extends Model
{
     use HasFactory;

    protected $fillable = ['name', 'description'];

    public function rooms()
{
    return $this->belongsToMany(
        Room::class, // Related model
        'room_amenity_room', // Pivot table name
        'room_amenity_id', // Foreign key on pivot table for the RoomAmenity model
        'room_id' // Foreign key on pivot table for the Room model
    );
}
}
