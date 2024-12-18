<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Define a one-to-many relationship with Booking.
     */
    public function bookings()
    {
        return $this->hasMany(Bookings::class, 'vehicle_id');
    }
}
