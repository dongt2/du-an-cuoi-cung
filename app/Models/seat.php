<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $primaryKey = 'seat_id';

    protected $fillable = [
        'screen_id',
        'place',
        'price',
        'status'
    ];

    // Định nghĩa mối quan hệ với bảng Showtimes
    public function showtime()
    {
        return $this->belongsTo(Showtime::class, 'showtime_id');
    }

    // Định nghĩa mối quan hệ với bảng Screens
    public function screen()
    {
        return $this->belongsTo(Screen::class, 'screen_id');
    }
}
