<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCombo extends Model
{
    use HasFactory;

    protected $table = 'order_combos';

    protected $primaryKey = 'ordercombo_id';

    protected $fillable = [
        'combo_id',
        'total_price',
        'quantity',
    ];

    public function combo()
    {
        return $this->belongsTo(Combo::class, 'combo_id', 'combo_id');
    }
}
