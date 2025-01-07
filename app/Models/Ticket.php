<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $primaryKey = 'ticket_id';

    protected $fillable = [
        'user_id',
        'transaction_id',
        'booking_id',
        'movie_id',
        'showtime_id',
        'seats',
        'qr_code',
        'token',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id');
    }
    public function showtime()
    {
        return $this->belongsTo(Showtime::class, 'showtime_id');
    }

}
