<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment');
    }

    public function createPayment(Request $request)
    {
        $vnp_TmnCode = "1IJERKAF"; // Mã website của bạn tại VNPAY
        $vnp_HashSecret = "7A9I9HBCKQQVLM252A4Z4I37FXH2CUNW"; // Chuỗi bí mật
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html"; // URL VNPAY
        $vnp_Returnurl = route('payment.return');

        $vnp_TxnRef = rand(100000, 999999); // Mã giao dịch
        $vnp_OrderInfo = $request->input('order_desc');
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->input('amount') * 100; // Số tiền tính bằng VND
        $vnp_Locale = 'vn';
        $vnp_BankCode = $request->input('bank_code');
        $vnp_IpAddr = $request->ip();

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];

        if ($vnp_BankCode != null && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            $hashdata .= urlencode($key) . "=" . urlencode($value) . "&";
            $query .= urlencode($key) . "=" . urlencode($value) . "&";
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        $vnp_Url = rtrim($vnp_Url, "&");
        if ($vnp_HashSecret) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= '&vnp_SecureHash=' . $vnpSecureHash;
        }

        return redirect($vnp_Url);
    }

    public function returnPayment(Request $request)
    {
        $vnp_HashSecret = "7A9I9HBCKQQVLM252A4Z4I37FXH2CUNW"; // Chuỗi bí mật
        $inputData = [];
        foreach ($request->all() as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $hashData = "";
        foreach ($inputData as $key => $value) {
            $hashData .= $key . '=' . $value . '&';
        }
        $hashData = rtrim($hashData, '&');

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        if ($secureHash == $request->input('vnp_SecureHash')) {
            if ($request->input('vnp_ResponseCode') == '00') {
                return "Transaction Success";
            } else {
                return "Transaction Failed";
            }
        } else {
            return "Invalid Signature";
        }
    }
}
