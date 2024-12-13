<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';

    protected $primaryKey = 'movie_id';

    protected $fillable = [
        'title',
        'duration',
        'country',
        'director',
        'description',
        'year',
        'release_date',
        'actors',
        'cover_image',
        'trailer_url',
        'category_id',
    ];



    public function category(){
        return $this->hasOne(Category::class, 'category_id', 'category_id');
    }


    public function bookings(){
        return $this->hasMany(Booking::class);
    }

    protected $casts = [
        'release_date' => 'date',
    ];
}
