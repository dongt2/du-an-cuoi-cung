<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'vouchers';

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    protected $dates = [
        'deleted_at',
    ];
    protected $primaryKey = 'voucher_id';

    protected $fillable = [
        'voucher_name',
        'code',
        'start_date',
        'end_date',
        'quantity',
        'deduct_amount',
        'deleted_at',
    ];
}
