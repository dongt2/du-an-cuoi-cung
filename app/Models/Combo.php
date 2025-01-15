<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Combo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'combos';

    protected $primaryKey = 'combo_id';

    protected $dates = [
        'deleted_at',
    ];

    protected $fillable = [
        'combo_name',
        'image',
        'short_description',
        'price',
        'quantity',
        'deleted_at',
    ];
}
