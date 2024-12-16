<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Movie;
use App\Models\Combo;
use App\Models\Showtime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    // Hiển thị thông tin phim và suất chiếu
    public function bookingWithMovie($id = null)
    {
        if ($id != null) {
            $movies = null;
            $movie = Movie::findOrFail($id);
            $showtime = DB::table('showtimes')
                ->join('screens', 'showtimes.screen_id', '=', 'screens.screen_id')
                ->where('showtimes.movie_id', $id)
                ->select('showtimes.*', 'screens.screen_name as screen_name')
                ->get()
                ->toArray();
        } else {
            $movie = null;
            $showtime = DB::table('showtimes')
                ->join('screens', 'showtimes.screen_id', '=', 'screens.screen_id')
                ->select('showtimes.*', 'screens.screen_name as screen_name')
                ->get()
                ->toArray();
            $movies = Movie::all();
        }

        return view('user.bookings.booking', compact('movie', 'movies', 'showtime'));
    }

    // Lưu thông tin bước 1 của đặt vé
    public function storeBooking(Request $request)
    {
        // try {
        $request->validate([
            'movie_id' => 'required',
            'movie_title' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|string',
        ]);

        session([
            'bookingStep1' => [
                'user_id' => auth()->id(),
                'movie_id' => $request->movie_id,
                'movie_title' => $request->movie_title,
                'date' => $request->date,
                'time' => $request->time,
            ],
        ]);

        // dd(session('bookingStep1'));

        return redirect()->route('user.bookings.stepTwo');
        // } catch (\Exception $e) {
        //     return back()->withErrors(['error' => $e->getMessage()]);
        // }
    }

    // Lưu thông tin bước 2 của đặt vé
    public function storeStepTwo(Request $request)
    {
        // try {
        $request->validate([
            'choosen_number' => 'required',
            'choosen_number_cheap' => 'required',
            'choosen_number_middle' => 'required',
            'choosen_number_expansive' => 'required',
            'choosen_cost' => 'required',
            'choosen_sits' => 'required',
        ]);

        session([
            'bookingStep2' => [
                'choosen_number' => $request->choosen_number,
                'choosen_number_cheap' => $request->choosen_number_cheap,
                'choosen_number_middle' => $request->choosen_number_middle,
                'choosen_number_expansive' => $request->choosen_number_expansive,
                'choosen_cost' => $request->choosen_cost,
                'choosen_sits' => $request->choosen_sits,
            ],
        ]);

        return redirect()->route('user.bookings.stepThree');
        // } catch (\Exception $e) {
        //     return back()->withErrors(['error' => $e->getMessage()]);
        // }
    }

    // Hiển thị danh sách combo
    // public function showCombo()
    // {
    //     $combos = Combo::all(); // Lấy tất cả combo từ database
    //     return view('booking.combo', compact('combos'));
    // }

    // // Xử lý chọn combo
    // public function selectCombo(Request $request)
    // {
    //     $request->validate([
    //         'combo_ids' => 'required|array',
    //         'combo_ids.*' => 'exists:combos,id',
    //     ]);

    //     $selectedCombos = Combo::whereIn('id', $request->combo_ids)->get();
    //     $comboTotal = $selectedCombos->sum('price');

    //     session([
    //         'selectedCombo' => [
    //             'ids' => $request->combo_ids,
    //             'total' => $comboTotal,
    //         ],
    //     ]);

    //     return redirect()->route('user.bookings.confirmation');
    // }
    public function showComboPage()
    {
        $combos = Combo::all(); // Lấy danh sách combo từ database
        $selectedCombo = session('selected_combo', null); // Combo được chọn, nếu có
        return view('booking.step3', compact('combos', 'selectedCombo'));
    }
    public function selectCombo(Request $request)
    {
        // Validate dữ liệu đầu vào
        $validated = $request->validate([
            'combo_id' => 'required|exists:combos,id',
            'combo_name' => 'required|string',
            'combo_price' => 'required|numeric',
        ]);

        // Lưu combo vào session
        session([
            'selected_combo' => [
                'id' => $validated['combo_id'],
                'name' => $validated['combo_name'],
                'price' => $validated['combo_price'],
            ]
        ]);

        // Cập nhật tổng chi phí
        $bookingStep2 = session('bookingStep2', []);
        $updatedCost = ($bookingStep2['choosen_cost'] ?? 0) + $validated['combo_price'];

        session(['bookingStep2' => ['choosen_cost' => $updatedCost]]);

        // Trả về phản hồi JSON
        return response()->json([
            'success' => true,
            'message' => 'Chọn combo thành công.',
            'total_cost' => number_format($updatedCost, 0, ',', '.')
        ]);
    }
    // Hiển thị thông tin thanh toán
    public function confirmation()
    {
        $bookingStep1 = session('bookingStep1', []);
        $bookingStep2 = session('bookingStep2', []);
        $selectedCombo = session('selectedCombo', null);
        // $finalTotal = ($bookingStep2['choosen_cost'] ?? 0) + ($selectedCombo['total'] ?? 0);
        $finalTotal = ($bookingStep2['choosen_cost'] ?? 0); // Tổng tiền sau khi cộng combo
        return view('user.bookings.confirmation', compact('bookingStep1', 'bookingStep2', 'selectedCombo', 'finalTotal'));
    }

    // Hiển thị trang bước cuối cùng
    public function stepFinal()
    {
        $ticketQuantity = session('ticket_quantity', 1); // Số lượng vé từ session (mặc định là 1)
        $ticketPrice = session('ticket_price', 200000); // Giá vé từ session (mặc định là 200,000 VNĐ)
        $combos = session('selectedCombo', []);
        $totalComboPrice = $combos['total'] ?? 0;
        $totalPrice = ($ticketQuantity * $ticketPrice) + $totalComboPrice;

        return view('user.bookings.stepFinal', compact('ticketQuantity', 'ticketPrice', 'totalComboPrice', 'totalPrice', 'combos'));
    }
    //     public function bookingStepThree()
    // {
    //     // Logic xử lý cho bước 3 (ví dụ: hiển thị giao diện chọn ghế ngồi)

    //     $bookingStep2 = session('bookingStep2', []); // Lấy thông tin bước 2 từ session

    //     // Nếu cần, bạn có thể thêm các logic kiểm tra hoặc xử lý ở đây

    //     return view('user.bookings.stepThree', compact('bookingStep2'));
    // }
    public function bookingStepThree(Request $request)
    {
        // Lấy danh sách combo
        $combos = Combo::all(); // Lấy dữ liệu từ database hoặc xử lý logic phù hợp
        // dd($combos);
        // Kiểm tra combo đã được chọn từ session hoặc logic khác
        $selectedCombo = session('selected_combo', null);
        // Truyền biến $combos vào view
        return view('user.bookings.stepFinal', compact('combos', 'selectedCombo'));
    }

    //     public function stepFinal() {
    //         $combo = Combo::all();
    //         return view('user.bookings.stepFinal', compact('combo'));

    // //        return view('user.bookings.stepFinal');
    //     }
    public function saveStep1(Request $request)
    {
        $bookingStep1 = [
            'movie_title' => $request->input('movie_title'),
            'date' => $request->input('date'),
            'time' => $request->input('time')
        ];

        session(['bookingStep1' => $bookingStep1]);

        return redirect()->route('booking.step2');
    }
    public function showStep3()
    {
        // Lấy dữ liệu từ session hoặc database
        $bookingStep1 = session('bookingStep1');
        $selectedCombo = session('selectedCombo');
        $finalTotal = $this->calculateTotal($bookingStep1, $selectedCombo);

        // Kiểm tra dữ liệu (nếu cần)
        if (!$bookingStep1) {
            return redirect()->route('booking.step1')->with('error', 'Vui lòng hoàn thành bước 1 trước.');
        }

        // Truyền dữ liệu sang View
        return view('booking.step3', compact('bookingStep1', 'selectedCombo', 'finalTotal'));
    }
    public function showComboStep()
    {
        // Dữ liệu mẫu cho combo
        $combos = collect([
            ['id' => 1, 'name' => 'LINE 3 SINGLE COMBO', 'short_description' => '1 ly Line 3 + 1 bắp ngọt lớn', 'price' => 259000],
            ['id' => 2, 'name' => 'LINE 2 DOUBLE COMBO', 'short_description' => '2 ly nước + 2 bắp ngọt lớn', 'price' => 399000],
        ]);

        $bookingStep1 = [
            'movie_title' => 'Avengers: Endgame',
            'date' => '2024-12-20',
            'time' => '19:00',
        ];

        return view('booking.combo', compact('combos', 'bookingStep1'));
    }

    public function showBookingSummary()
    {
        $bookingStep1 = [
            'movie_title' => 'Tên Phim',
            'date' => 'Ngày Chiếu',
            'time' => 'Giờ Chiếu',
        ];

        return view('your-view-name', compact('bookingStep1'));
    }
}
