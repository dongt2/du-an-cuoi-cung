<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movie extends Model
{
    use HasFactory;

    protected $table = 'movies';

    protected $primaryKey = 'movie_id';

    protected $fillable = [
        'title',
        'duration',
        'country',
        'description',
        'year',
        'release_date',
        'actors',
        'image',
        'trailer_url',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }
}
