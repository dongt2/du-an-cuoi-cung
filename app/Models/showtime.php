<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class showtime extends Model
{
    use HasFactory;

    protected $table = 'showtimes';

    protected $primaryKey = 'showtime_id';

    protected $fillable = [
        'movie_id',
        'screen_id',
        'showtime_date',
        'time',
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id', 'movie_id');
    }

    public function screen()
    {
        return $this->belongsTo(Screen::class, 'screen_id', 'screen_id');
    }
}
