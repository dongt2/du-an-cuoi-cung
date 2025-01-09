<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;

    protected $fillable = [
        'directors',
    ];

    public function director(){
        return $this->belongsToMany(Movie::class, 'movie_directors', 'director_id', 'movie_id');
    }
}
