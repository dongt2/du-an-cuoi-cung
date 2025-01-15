<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory, SoftDeletes;


    protected $table = 'reviews';

    protected $primaryKey = 'review_id';

    protected $dates = [
        'deleted_at',
    ];

    protected $fillable = [
        'movie_id',
        'user_id',
        'review_date',
        'review_time',
        'comment',
        'deleted_at',
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id', 'movie_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
