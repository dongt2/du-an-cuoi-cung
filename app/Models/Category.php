<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';

    protected $primaryKey = 'category_id';

    protected $dates = [
        'deleted_at',
    ];
    protected $fillable = [
        'category_name',
        'deleted_at'
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
