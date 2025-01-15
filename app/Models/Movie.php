<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory,SoftDeletes;

    protected $dates = [
        'deleted_at',
    ];
    protected $casts = [
        'release_date' => 'date',
    ];

    protected $table = 'movies';

    protected $primaryKey = 'movie_id';

    protected $fillable = [
        'title',
        'duration',
        'country',
        'description',
        'year',
        'release_date',
        'cover_image',
        'trailer_url',
        'deleted_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'movie_categories', 'movie_id', 'category_id');
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'movie_actors', 'movie_id','actor_id');
    }

    public function directors()
    {
        return $this->belongsToMany(Director::class, 'movie_directors', 'movie_id', 'director_id');
    }

    public function showtimes()
    {
        // Define the correct foreign key and local key
        return $this->hasMany(Showtime::class, 'movie_id', 'movie_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'movie_id');
    }

    public function reviews_today()
    {
        return $this->hasMany(Review::class, 'movie_id') // Assuming links with movie_id
        ->whereDate('created_at', now()->toDateString()); // Filters reviews created today
    }
}
