<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function paymentPage()
    {
        // Hiển thị trang thanh toán
        return view('vnpay.payment');
    }

    public function createPayment(Request $request)
    {
        $vnpayData = $this->createVnpayData($request);
        $vnpayUrl = env('VNPAY_URL') . '?' . http_build_query($vnpayData);

        return redirect($vnpayUrl);
    }

    public function returnPayment(Request $request)
    {
        $vnpayData = $request->all();
        $this->verifyPayment($vnpayData);

        return view('vnpay.return', compact('vnpayData'));
    }

    private function createVnpayData(Request $request)
    {
        $vnp_TxnRef = date('YmdHis');
        $vnp_Amount = $request->amount * 100; // Convert to VND (cents)
        $vnp_Currency = 'VND';
        $vnp_OrderInfo = 'Thanh toán hóa đơn';
        $vnp_OrderType = 'billpayment';
        $vnp_Locale = 'vn';
        $vnp_Returnurl = env('VNPAY_RETURN_URL');
        $vnp_TmnCode = env('VNPAY_MERCHANT_ID');
        $vnp_HashSecret = env('VNPAY_SECRET_KEY');

        $vnp_Data = [
            'vnp_Version' => '2.1.0',
            'vnp_TmnCode' => $vnp_TmnCode,
            'vnp_Amount' => $vnp_Amount,
            'vnp_Command' => 'pay',
            'vnp_CreateDate' => Carbon::now()->format('YmdHis'),
            'vnp_Currency' => $vnp_Currency,
            'vnp_Locale' => $vnp_Locale,
            'vnp_OrderInfo' => $vnp_OrderInfo,
            'vnp_OrderType' => $vnp_OrderType,
            'vnp_ReturnUrl' => $vnp_Returnurl,
            'vnp_TxnRef' => $vnp_TxnRef,
        ];

        ksort($vnp_Data);
        $query = http_build_query($vnp_Data);
        $vnp_SecureHash = hash('sha256', $query . '&' . $vnp_HashSecret);

        $vnp_Data['vnp_SecureHash'] = $vnp_SecureHash;

        return $vnp_Data;
    }

    private function verifyPayment($vnpayData)
    {
        $vnp_HashSecret = env('VNPAY_SECRET_KEY');
        $secureHash = $vnpayData['vnp_SecureHash'];
        unset($vnpayData['vnp_SecureHash']);
        ksort($vnpayData);
        $query = http_build_query($vnpayData);
        $hashData = hash('sha256', $query . '&' . $vnp_HashSecret);

        if ($secureHash == $hashData) {
            // Payment is valid
            // Process the payment and update order status
        } else {
            // Payment is invalid
        }
    }
}
