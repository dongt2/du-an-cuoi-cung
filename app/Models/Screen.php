<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Screen extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'screens';

    protected $primaryKey = 'screen_id';

    protected $dates = [
        'deleted_at',
    ];

    protected $fillable = [
        'screen_name',
        'deleted_at',
    ];
    public function showtime()
    {
        return $this->hasMany(Showtime::class, 'screen_id', 'screen_id');
    }
}
