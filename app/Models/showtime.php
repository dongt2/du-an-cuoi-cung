<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    use HasFactory;

    protected $table = 'showtimes';

    protected $primaryKey = 'showtime_id';

    protected $fillable = [
        'user_id',
        'movie_id',
        'screen_id',
        'date',
        'time',
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id', 'movie_id', 'user_id');
    }

    public function screen()
    {
        return $this->belongsTo(Screen::class, 'screen_id', 'screen_id', 'user_id');
    }
}
