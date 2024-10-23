<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    /** @use HasFactory<\Database\Factories\BookingsFactory> */
    use HasFactory;
    protected $guarded = ['id'];
}
