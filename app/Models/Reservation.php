<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'arrival_date', 
        'departure_date', 
        'rate_type_id', 
        'adults', 
        'kids', 
        'is_tax_inclusive', 
        'customer_details', 
        'room_id', 
        'proof_type', 
        'proof_of_identification',
        'guest_id',
    ];

    protected $casts = [
        'customer_details' => 'array',
        'is_tax_inclusive' => 'boolean',
    ];

    public function rateType()
    {
        return $this->belongsTo(RateType::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function guest()
{
    return $this->belongsTo(Guest::class);
}

}