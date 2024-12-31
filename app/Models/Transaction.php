<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions'; // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'transaction_id'; //

    protected $fillable = [
        'booking_id',
        'user_id',
        'payment_method',
        'total',
        'payment_date',
        'status_payment',
    ];

    // Các quan hệ với các model khác (nếu cần)
    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
