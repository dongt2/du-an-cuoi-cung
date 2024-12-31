<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;

    protected $table = 'bookings_details';

    protected $primaryKey = 'bookingdetail_id';

    protected $fillable = [
        'booking_id',
        'seat_id',
    ];
}
