<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seat extends Model
{
    use HasFactory;

    protected $table = 'seats';

    protected $primaryKey = 'seat_id';

    protected $fillable = [
        'status',
        'seat_type',
        'seat_number',
        'screen_id',
    ];

    public function screen()
    {
        return $this->belongsTo(Screen::class, 'screen_id', 'screen_id');
    }
}
