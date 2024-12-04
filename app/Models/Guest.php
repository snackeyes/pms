<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'address', 
        'city', 
        'state', 
        'country', 
        'mobile', 
        'email', 
        'proof_type', 
        'proof_of_identification'
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    // Accessor for name
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
