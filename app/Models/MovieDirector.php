<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieDirector extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'director_id',
    ];
}
