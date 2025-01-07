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

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class, 'movie_id', 'movie_id');
    }

    public function getAverageRatingAttribute()
    {
        return round($this->reviews()->avg('rating'), 1);
    }
    // Movie model
    public function reviews_today()
    {
        return $this->hasMany(Review::class, 'movie_id') // Assuming links with movie_id
        ->whereDate('created_at', now()->toDateString()); // Filters reviews created today
    }
}
