<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraCharge extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'tax_id', 'rate'];

    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }
}
