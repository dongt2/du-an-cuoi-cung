<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Combo;
use App\Models\Movie;
use App\Models\Screen;
use App\Models\Seat;
use App\Models\Showtime;
use Illuminate\Http\Request;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function generateRandomOrderCode($length = 8) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function bookingStore1($id)
    {
        $data = Movie::where('movie_id', $id)->first();
        session([
            'movie' => [

                'movie_id' => $data->movie_id,
                'title' => $data->title,
            ]
        ]);
        return redirect()->route('user.booking1');
    }

    public function viewBooking1()
    {
        if (session('movie')) {
            $data = Movie::where('movie_id', session('movie')['movie_id'])->get();
        } else {
            $data = Movie::all();
        }
        $screens = Screen::all();

        return view('user.booking.booking1', compact('data', 'screens'));
    }

    public function getShowtimes(Request $request)
    {
        $screen_id = $request->input('screen_id');
        $movie_id = $request->input('movie_id');

        $showtimes = Showtime::where('movie_id', $movie_id)
            ->where('screen_id', $screen_id)
            ->get()
            ->groupBy('showtime_date');

        return response()->json($showtimes);
    }


    public function bookingStore2(Request $request)
    {
        session([
            'booking' => [
                'code_movie' => $this->generateRandomOrderCode(),
                'movie_id' => $request->input('movie_id'),
                'screen_id' => $request->input('screen_id'),
                'showtime_date' => $request->input('showtime_date'),
                'showtime_time' => $request->input('showtime_time'),
            ]
        ]);
//        dd(session()->get('booking'));
        return redirect()->route('user.booking2');
    }

    public function viewBooking2()
    {
        // dd(session()->get('booking'));
        $showtime_id = Showtime::where('movie_id', session('booking.movie_id'))
            ->where('screen_id', session('booking.screen_id'))
            ->where('showtime_date', session('booking.showtime_date'))
            ->where('time', session('booking.showtime_time'))
            ->value('showtime_id');
        // $showtime_id = 1;

        $data = Seat::where('showtime_id', $showtime_id)
            ->select('place', 'price', 'status')
            ->orderByRaw("SUBSTRING(place, 1, 1), CAST(SUBSTRING(place, 2) AS UNSIGNED)")
            ->get();

        return view('user.booking.booking2', compact("data"));
    }


    public function bookingStore3(Request $request)
    {
        session()->push('booking.seats', array_filter($request->all(), fn($key) => $key !== '_token' && $key !== 'total_price'));
        session(['booking.seats' => $request->except(['_token', 'total_price'])]);
        session(['booking.total_price' => $request->input('total_price')]);
        // dd(session()->get('booking'));
        return redirect()->route('user.booking3');
    }

    public function viewBooking3()
    {
        $combos = Combo::get();
        return view('user.booking.booking3', compact('combos'));
    }


    public function vnpay_payment(Request $request)
    {
        $data = $request->all();

        $code = session('booking.code_movie');
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/";
        $vnp_TmnCode = "LVYOOXSX";//Mã website tại VNPAY
        $vnp_HashSecret = "L5NY1FEL473DG8W77E8G5J76N16VJJNR"; //Chuỗi bí mật

        $vnp_TxnRef = $code; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán vé xem phim'; //nội dung thanh toán
        $vnp_OrderType = 'Phimmoi Ticket';
        $vnp_Amount = $data['total'] * 100000;
        $vnp_Locale = 'VN';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = array(
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
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
            // vui lòng tham khảo thêm tại code demo


    }
}
