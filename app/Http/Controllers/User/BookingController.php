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

    private function generateRandomOrderCode($length = 8)
    {
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
        if (Auth::user() == null) {
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
        $data = Movie::where('movie_id', session('movie.movie_id'))->get()->filter(function ($movie) {
            // Convert premiere date to Carbon instance and validate
            $premiereTime = \Illuminate\Support\Carbon::parse($movie->premiere_date);
            $currentTime = Carbon::now();

            // Exclude if premiere was yesterday or earlier
            if ($premiereTime->isPast() && !$premiereTime->isToday()) {
                return false;
            }

            // Exclude if premiere is within the next 5 minutes
            if ($premiereTime->diffInMinutes($currentTime) <= 5 && $premiereTime->isFuture()) {
                return false;
            }

            return true; // Include the movie if it passes both checks
        });

        $screen_ids = Showtime::where('movie_id', session('movie.movie_id'))
            ->where(function ($query) {
                // Filter out past showtimes (use Carbon for current time)
                $currentTime = Carbon::now();
                $query->where('showtime_date', '>', $currentTime->toDateString())
                    ->orWhere(function ($query) use ($currentTime) {
                        $query->where('showtime_date', '=', $currentTime->toDateString())
                            ->where('time', '>=', $currentTime->format('H:i:s'));
                    });
            })
            ->distinct()
            ->pluck('screen_id');

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

        // Lấy thời gian hiện tại + 15 phút
        $currentTime = Carbon::now()->addMinutes(15);

        // Truy vấn suất chiếu và thông tin duration từ bảng movies
        $showtimes = Showtime::select('showtimes.*', 'movies.duration')
            ->join('movies', 'movies.movie_id', '=', 'showtimes.movie_id')
            ->where('showtimes.movie_id', $movie_id)
            ->where('showtimes.screen_id', $screen_id)
            ->where(function ($query) use ($currentTime) {
                $query->where('showtime_date', '>', $currentTime->toDateString()) // Ngày lớn hơn ngày hiện tại
                    ->orWhere(function ($query) use ($currentTime) {
                        $query->where('showtime_date', '=', $currentTime->toDateString()) // Cùng ngày
                            ->where('time', '>=', $currentTime->format('H:i:s')); // Thời gian >= hiện tại + 15 phút
                    });
            })
            ->orderBy('showtime_date')
            ->orderBy('time')
            ->get()
            ->map(function ($showtime) {
                $endTime = Carbon::createFromFormat('H:i:s', $showtime->time)
                    ->addMinutes($showtime->duration)
                    ->format('H:i');
                $showtime->end_time = $endTime;
                return $showtime;
            })
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
//         dd(session()->get('booking'));
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
        $voucher = Voucher::get();
        return view('user.booking.booking3', compact('combos', 'movie_name', 'screen_name','voucher'));
    }

    public function getPriceCombo(Request $request)
    {
        $combos = $request->input('combos');

        $totalCombos = 0;
        $price_combo = 0;

        foreach ($combos as $combo) {
            $totalCombos += $combo['quantity']; // Count total combos
            $price_combo += $combo['price'] * $combo['quantity'];
            $combo_id = $combo['id'];
            $quantity = $combo['quantity'];
        }
        $session = session('booking.quantity_combo');
        // Subtract quantity logic
        $comboItem = Combo::find($combo['id']);
        if ($comboItem) {
            if($quantity > $session) {
                $trunggian = $quantity - $session;
                $comboItem->quantity = $comboItem->quantity - $trunggian;
                $session = $session + $trunggian;
                session(['booking.quantity_combo' => $session]);
            }else{
                $trunggian = $session - $quantity;
                $comboItem->quantity = $comboItem->quantity + $trunggian;
                $session + $trunggian = $session;
                session(['booking.quantity_combo' => $session]);
            }

            // Deduct the quantity for the combo
            $comboItem->save();
        } else {
            return response()->json(['error' => 'Combo does not exist'], 404);
        }


        if ($totalCombos > 8) {
            return response()->json(['error' => 'You cannot select more than 8 combos in total.'], 400);
        }

        session(['booking.price_combo' => $price_combo]);
        session(['booking.combos' => $combos]);
        session(['booking.combo_id' => $combo_id]);
        session(['booking.quantity_combo' => $quantity]);

        return response()->json(['success' => 'Combos added successfully!', 'price_combo' => $price_combo]);
    }

    public function getPriceVoucher(Request $request)
    {
        // Validate Voucher Input
        $request->validate([
            'voucher' => 'required|string|max:255',
        ]);

        $voucherCode = $request->input('voucher');

        // Fetch Voucher from the database
        $voucher = Voucher::where('code', $voucherCode)->first();

        // Prices from session
        $priceTicket = session('booking.price_ticket', 0);
        $priceCombo = session('booking.price_combo', 0);
        $priceVoucher = 0; // Default discount is 0

        if ($voucher) {
            // Check if voucher has remaining quantity
            if ($voucher->quantity > 0) {
                // Calculate voucher discount as a percentage of total price
                $priceVoucher = ($voucher->deduct_amount / 100) * ($priceTicket + $priceCombo);

                // Deduct 1 from voucher quantity in the database
                $voucher->quantity -= 1;
                $voucher->save(); // Persist the change to the database

                // Store the voucher information in the session
                session([
                    'booking.price_voucher' => $priceVoucher,
                    'booking.voucher_code' => $voucher->code,
                    'booking.voucher_name' => $voucher->voucher_name,
                    'booking.voucher_id' => $voucher->voucher_id,
                ]);
            } else {
                return response()->json(['error' => 'Voucher is no longer available.'], 400);
            }
        } else {
            return response()->json(['error' => 'Voucher does not exist.'], 404);
        }

        // Calculate the total price after applying the voucher discount
        $priceTotal = $priceTicket + $priceCombo - $priceVoucher;
        session(['booking.price_total' => $priceTotal]);

        return response()->json([
            'success' => 'Áp dụng mã giảm giá thành công!',
            'price_total' => $priceTotal
        ]);
    }

    public function destroyVoucher(Request $request)
    {
        // Check if a voucher code exists in the session
        $voucherCode = session('booking.voucher_code');

        if ($voucherCode) {
            // Fetch the voucher from the database using the code
            $voucher = Voucher::where('code', $voucherCode)->first();

            if ($voucher) {
                // Increment the quantity of the voucher
                $voucher->quantity += 1;
                $voucher->save(); // Save the updated quantity in the database
            }

            // Remove the voucher information from the session
            session()->forget('booking.voucher_code');
            session()->put('booking.price_voucher', 0); // Optionally reset voucher price to zero
        }

        return response()->json([
            'success' => 'Bạn đã xóa mã giảm giá thành công!',
        ]);
    }

    public function vnpay_payment(Request $request)
    {
        $dataorder = session()->get('booking');
//        dd($dataorder);

        //        dd($dataorder);
        $data = $request->all();

        $code = $dataorder['order_code'];
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('user.vnpay_return');
        $vnp_TmnCode = "LVYOOXSX"; //Mã website tại VNPAY
        $vnp_HashSecret = "L5NY1FEL473DG8W77E8G5J76N16VJJNR"; //Chuỗi bí mật

        $vnp_TxnRef = $code; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán vé xem phim'; //nội dung thanh toán
        $vnp_OrderType = 'Phimmoi Ticket ' . $vnp_TxnRef; //Loại đơn hàng
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

                if(isset($data_order['price_combo'])){
                    $data_order['price_ticket'] += $data_order['price_combo'];
                } else {
                    $data_order['price_ticket'] += 0;
                }

//                if (isset($data_order['voucher_code'])) {
//                    $voucher = Voucher::where('code', $data_order['voucher_code'])->first();
//
//                    if ($voucher) {
//                        // Ensure there's enough voucher quantity
//                        if ($voucher->quantity > 0) {
//                            $voucher->quantity -= 1;
//                            $voucher->save();
//                        } else {
//                            return redirect()->route('payment-fail')->with('error', 'Voucher is no longer available.');
//                        }
//                    } else {
//                        return redirect()->route('payment-fail')->with('error', 'Invalid voucher code.');
//                    }
//                }
//                dd($data_order);
                $booking = Booking::create([
                    'user_id' => $data_order['user_id'],
                    'movie_id' => $data_order['movie_id'],
                    'screen_id' => $data_order['screen_id'],
                    'order_code' => $data_order['order_code'],
                    'total_price' => $data_order['price_ticket'],

                    'combo_id' => isset($data_order['combo_id']) ? $data_order['combo_id'] : null,
                    'quantity_combo' => isset($data_order['quantity_combo']) ? $data_order['quantity_combo'] : 0,
                    'voucher_id' => isset($data_order['voucher_id']) ? $data_order['voucher_id'] : null,

                    'showtime_date' => $data_order['showtime_date'],
                    'showtime_time' => $data_order['showtime_time'],
                ]);



                $transaction =  Transaction::create([
                    'booking_id' => $booking->booking_id,
                    'user_id' => $data_order['user_id'],
                    'payment_method' => 'online',
                    'total' => isset($data_order['price_total']) ? $data_order['price_total'] : $data_order['price_ticket'],
                    'payment_date' => Carbon::now(),
                    'status_payment' => 'completed',
                ]);

                $ticket = Ticket::create([
                    'booking_id' => $booking->booking_id,
                    'transaction_id' => $transaction->transaction_id,
                    'user_id' => $data_order['user_id'],
                    'movie_id' => $data_order['movie_id'],
                    'showtime_id' => Showtime::where('movie_id', $data_order['movie_id'])
                        ->where('screen_id', $data_order['screen_id'])
                        ->where('showtime_date', $data_order['showtime_date'])
                        ->where('time', $data_order['showtime_time'])
                        ->value('showtime_id'),
                    'seats' => json_encode($data_order['seats']),
                    'qr_code' => 'qr_code',
                ]);

                Seat::where('showtime_id', $ticket->showtime_id)
                    ->whereIn('place', array_keys($data_order['seats']))
                    ->update(['status' => 'Đã đặt']);


                // Generate QR code
                // check in
                $qrCode = QrCode::format('svg')->size(250)->generate(route('admin.checkin', $ticket->ticket_id));
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
            ->with('booking', 'transaction')
            ->first();
//        dd($ticket);
        // Decode the seats JSON string to an array
        $ticket->seats = json_decode($ticket->seats, true);


        return view('user.booking.payment-success', compact('ticket'));
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

            if ($diffInMinutes > 20) {
                return response()->json(['time_limit' => 15]);
            } elseif ($diffInMinutes > 10) {
                return response()->json(['time_limit' => 5]);
            } else {
                return response()->json(['time_limit' => -1]);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }
    public function updateSeatStatus(Request $request)
    {
        $seatId = $request->input('seat_id');
        $status = $request->input('status'); // 'reserved' or 'available'

        $seat = Seat::find($seatId);
        if ($seat) {
            $seat->status = $status;
            $seat->save();

            // Broadcast the change to other users
            broadcast(new SeatSelected($seat))->toOthers();

            return response()->json(['success' => true, 'seat' => $seat]);
        }

        return response()->json(['success' => false, 'message' => 'Seat not found']);
    }

}
