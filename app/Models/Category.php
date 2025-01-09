<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $primaryKey = 'category_id';

    protected $fillable = [
        'category_name',
    ];
    // public function movie(){
    //     return $this->hasMany(Movie::class, 'movie_id', 'movie_id');
    // }

    // public function movies(){
    //     return $this->hasMany(Movie::class, 'category_id', 'category_id');
    // }

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_categories', 'category_id', 'movie_id');
    }
}
