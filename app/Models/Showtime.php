<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    use HasFactory;

//    protected $casts = [
//            'showtime_date' => 'date',
//            'time' => 'datetime',
//        ];

    protected $table = 'showtimes';

    protected $primaryKey = 'showtime_id';

    protected $fillable = [
        'movie_id',
        'screen_id',
        'showtime_date',
        'time',
    ];



    public function screen()
    {
        return $this->belongsTo(Screen::class, 'screen_id', 'screen_id');
    }

    public function movies()
    {
        return $this->belongsTo(Movie::class);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('showtime_date', '>=', now()->toDateString());
    }

    public function movie()
    {
        // Define the relationship back to the Movie model
        return $this->belongsTo(Movie::class, 'movie_id', 'movie_id');
    }
}
