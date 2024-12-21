<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $primaryKey = 'seat_id';

    protected $fillable = [
        'showtime_id',
        'place',
        'price',
        'status'
    ];

    // Định nghĩa mối quan hệ với bảng Showtimes
    public function showtime()
    {
        return $this->belongsTo(Showtime::class, 'showtime_id', 'showtime_id');
    }
}