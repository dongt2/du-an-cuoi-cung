<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $fillable = [
        'actor_name',
    ];

    public function actor(){
        return $this->belongsToMany(Movie::class, 'movie_actors', 'actor_id', 'movie_id');
    }
}
