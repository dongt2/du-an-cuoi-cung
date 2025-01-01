<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Combo;
use App\Models\Movie;
use App\Models\Screen;
use App\Models\Seat;
use App\Models\Showtime;
use App\Models\Ticket;
use App\Models\Transaction;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Events\SeatSelected;

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
        if(Auth::user() == null){
            return redirect()->route('login.index');
        } else {

            session([
                'movie' => [
                    'duration' => $data->duration,
                    'user_id' => auth()->user()->id,
                    'movie_id' => $data->movie_id,
                    'title' => $data->title,
                ]
            ]);
            return redirect()->route('user.booking1');
        }
    }

    public function viewBooking1()
    {

        if (session('movie')) {
            $data = Movie::where('movie_id', session('movie.movie_id'))->get();
        } else {
            $data = Movie::all();
        }

        $screen_ids = Showtime::where('movie_id', session('movie.movie_id'))->pluck('screen_id');
        $screens = Screen::whereIn('screen_id', $screen_ids)
            ->select('screen_id', 'screen_name')
            ->get();

        return view('user.booking.booking1', compact('data', 'screens'));
    }

    public function getScreens(Request $request)
    {
        $movie_id = $request->input('movie_id');
        $screen_ids = Showtime::where('movie_id', $movie_id)->pluck('screen_id');
        $screens = Screen::whereIn('screen_id', $screen_ids)
            ->select('screen_id', 'screen_name')
            ->get();

        // Trả về dữ liệu dưới dạng JSON
        return response()->json($screens);
    }


    public function getShowtimes(Request $request)
    {
        $screen_id = $request->input('screen_id');
        $movie_id = $request->input('movie_id');

        // Truy vấn và sắp xếp theo ngày và giờ
        $showtimes = Showtime::where('movie_id', $movie_id)
            ->where('screen_id', $screen_id)
            ->orderBy('showtime_date')
            ->orderBy('time')
            ->get()
            ->groupBy('showtime_date');

        return response()->json($showtimes);
    }


    public function bookingStore2(Request $request)
    {
        session([
            'booking' => [
                'user_id' => auth()->user()->user_id,
                'order_code' => $this->generateRandomOrderCode(),
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
        session()->push('booking.seats', array_filter($request->all(), fn($key) => $key !== '_token' && $key !== 'price_ticket'));
        session(['booking.seats' => $request->except(['_token', 'price_ticket'])]);
        session(['booking.price_ticket' => $request->input('price_ticket')]);
//         dd(session()->get('booking'));
        return redirect()->route('user.booking3');
    }

    public function viewBooking3()
    {
        $movie_name = Movie::where('movie_id', session('booking.movie_id'))->value('title');
        $screen_name = Screen::where('screen_id', session('booking.screen_id'))->value('screen_name');
        $combos = Combo::get();
        return view('user.booking.booking3', compact('combos', 'movie_name', 'screen_name'));
    }

    public function getPriceCombo(Request $request)
    {
            $combos = $request->input('combos');

            $price_combo = 0;

                foreach ($combos as $combo) {
                    $price_combo += $combo['price'] * $combo['quantity'];
                }
                session(['booking.price_combo' => $price_combo]);
                session(['booking.combos' => $combos]);

                $priceTotal = session(['booking.price_total']) + $price_combo;
                session(['booking.price_total' => $priceTotal]);
                return response()->json($combos);



    }

    public function getPriceVoucher(Request $request)
    {
        $request->validate([
            'voucher' => 'required|string|max:255',
        ]);

        $voucherCode = $request->input('voucher');
        $voucher = Voucher::where('code', $voucherCode)->first();

        $priceTicket = session('booking.price_ticket', 0);
        $priceCombo = session('booking.price_combo', 0);
        $priceVoucher = 0; // Mặc định không có giảm giá

        if ($voucher) {
            $priceVoucher = $voucher->deduct_amount;
            session(['booking.price_voucher' => $priceVoucher]);
            session(['booking.voucher_name' => $voucher->name]);
        } else {
            session()->forget('booking.price_voucher');
        }

        $priceTotal = $priceTicket + $priceCombo - $priceVoucher;
        session(['booking.price_total' => $priceTotal]);

        if ($voucher) {
            return response()->json(['success' => 'Mã giảm giá áp dụng thành công', 'price_total' => $priceTotal]);
        } else {
            return response()->json(['error' => 'Mã giảm giá không tồn tại hoặc đã được sử dụng', 'price_total' => $priceTotal]);
        }
    }

    public function vnpay_payment(Request $request)
    {
        $dataorder = session()->get('booking');

//        dd($dataorder);
        $data = $request->all();

        $code = $dataorder['order_code'];
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('user.vnpay_return');
        $vnp_TmnCode = "LVYOOXSX";//Mã website tại VNPAY
        $vnp_HashSecret = "L5NY1FEL473DG8W77E8G5J76N16VJJNR"; //Chuỗi bí mật

        $vnp_TxnRef = $code; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán vé xem phim'; //nội dung thanh toán
        $vnp_OrderType = 'Phimmoi Ticket ' .$vnp_TxnRef; //Loại đơn hàng
        $vnp_Amount = $data['total'] * 100; //Số tiền thanh toán. Số tiền không có dấu phẩy
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
        $hashdata = http_build_query($inputData);
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
        $query = $hashdata . '&vnp_SecureHash=' . $vnpSecureHash;

        session('pending_payment', $dataorder);

        return redirect($vnp_Url . "?" . $query);

    }

    public function vnpay_return(Request $request)
    {

        $vnp_ResponseCode = $request->input('vnp_ResponseCode');
        $vnp_TxnRef = $request->input('vnp_TxnRef');
        $vnp_SecureHash = $request->input('vnp_SecureHash');
        $vnp_HashSecret = "L5NY1FEL473DG8W77E8G5J76N16VJJNR";

        $inputData = $request->except('vnp_SecureHash');
        ksort($inputData);
        $hashdata = http_build_query($inputData);
        $secureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);



        if ($vnp_SecureHash == $secureHash) {
            if ($vnp_ResponseCode == '00') {


                $data = session('pending_payment');
                $data['status'] = 1;

                $data_order = session()->get('booking');

//                dd($data_order);

                $booking = Booking::create([
                    'user_id' => $data_order['user_id'],
                    'movie_id' => $data_order['movie_id'],
                    'screen_id' => $data_order['screen_id'],
                    'order_code' => $data_order['order_code'],
                    'total_price' => $data_order['price_ticket'],

                    'order_combo' => isset($data_order['order_combo']) ? $data_order['order_combo'] : null,
                    'voucher' => isset($data_order['voucher']) ? $data_order['voucher'] : null,

                    'showtime_date' => $data_order['showtime_date'],
                    'showtime_time' => $data_order['showtime_time'],
                ]);

                $transaction =  Transaction::create([
                    'booking_id' => $booking->booking_id,
                    'user_id' => $data_order['user_id'],
                    'payment_method' => 'online',
                    'total' => $data_order['price_ticket'],
                    'payment_date' => Carbon::now(),
                    'status_payment' => 'completed',
                ]);

                $ticket = Ticket::create([
                    'booking_id' => $booking->booking_id,
                    'transaction_id' => $transaction->transaction_id,
                    'seats' => json_encode($data_order['seats']),
                    'qr_code' => 'qr_code',
                ]);


                // Generate QR code
                $qrCode = QrCode::format('svg')->size(250)->generate(route('ticket.show', $ticket->ticket_id));
                $qrCodePath = 'public/qrcodes/ticket_' . $ticket->ticket_id . '.svg';
                Storage::put($qrCodePath, $qrCode);

                // Update ticket with QR code path
                $ticket->update(['qr_code' => $qrCodePath]);

                session()->forget('bookings');
                session([
                    'data' => [
                        'booking_id' => $booking->booking_id,
                        'transaction_id' => $transaction->transaction_id,
                    ]
                ]);

                return redirect()->route('payment-success')->with('success', 'Thanh toán thành công');
            } else {
                return redirect()->route('payment-fail')->with('error', 'Thanh toán thất bại');
            }
        } else {
            return redirect()->route('payment-fail')->with('error', 'Chữ ký không hợp lệ');
        }
    }

    public function paymentSuccess()
    {
        $ticket = Ticket::where('transaction_id', session('data.transaction_id'))
            ->with('booking')
            ->first();
// Decode the seats JSON string to an array
        $ticket->seats = json_decode($ticket->seats, true);

//        dd($ticket);

        return view('user.booking.payment-success', compact( 'ticket'));
    }

    public function paymentFail()
    {
        return view('bookings.payment-fail');
    }


    public function downloadQrCode($id)
    {
        $ticket = Ticket::findOrFail($id);
        $qrCodePath = storage_path('app/' . $ticket->qr_code);

        return response()->download($qrCodePath);
    }
    public function showTicket($id)
    {
        $ticket = Ticket::with('booking', 'transaction')->findOrFail($id);

        return view('user.tickets.ticket', compact('ticket'));
    }

    // set time
    public function getTimeLimit()
    {
        try {
            $showtime = session('booking.showtime_time');
            $showtimeDate = session('booking.showtime_date');

            // Correct format string
            $showtimeDateTime = Carbon::createFromFormat('Y-m-d H:i', $showtimeDate . ' ' . $showtime);
            $currentTime = Carbon::now();

            $diffInMinutes = $showtimeDateTime->diffInMinutes($currentTime);

            if ($diffInMinutes > 30) {
                return response()->json(['time_limit' => 15]);
            } elseif ($diffInMinutes > 15) {
                return response()->json(['time_limit' => 5]);
            } elseif ($diffInMinutes > 5) {
                return response()->json(['time_limit' => 0]);
            } else {
                return response()->json(['time_limit' => -1]);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }

}
