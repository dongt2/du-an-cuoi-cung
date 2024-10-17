<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions'; // Tên bảng trong cơ sở dữ liệu

    protected $fillable = [
        'voucher_id',
        'booking_id',
        'user_id',
        'payment_method',
        'total',
        'date_time',
    ];

    // Các quan hệ với các model khác (nếu cần)
    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
