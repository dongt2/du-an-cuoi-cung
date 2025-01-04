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
}
