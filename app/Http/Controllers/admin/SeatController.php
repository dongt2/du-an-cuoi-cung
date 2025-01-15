<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\seat;
use App\Models\screen;
use App\Models\Showtime;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!$request->has('showtime')) {
            return redirect()->route('admin.seat.index', ['showtime' => 0]);
        }

        $showtimes = Showtime::with(['movie', 'screen'])
            ->whereRaw(
                "CONCAT(showtime_date, ' ', time) > ?",
                [Carbon::now('Asia/Ho_Chi_Minh')->addMinutes(15)]
            )
            ->orderBy('showtime_date')
            ->orderBy('time')
            ->get();
        $showtime_id = $request->input('showtime');

        // Lấy tất cả các ghế đã có trong cơ sở dữ liệu
        $seats = Seat::where('showtime_id', $showtime_id)->pluck('place')->toArray();

        // Lấy danh sách các hàng đã đầy
        $fullRows = [];
        foreach (['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K'] as $row) {
            $rowSeats = array_filter($seats, fn($seat) => strpos($seat, $row) === 0);
            if (count($rowSeats) >= 18) {  // Nếu số ghế trong hàng >= 18 thì coi như đầy
                $fullRows[] = $row;
            }
        }

        // Lấy dữ liệu ghế và sắp xếp
        $data = Seat::where('showtime_id', $showtime_id)
            ->select('place', 'status', 'price')
            ->orderByRaw("SUBSTRING(place, 1, 1), CAST(SUBSTRING(place, 2) AS UNSIGNED)")
            ->get();

        return view("admin.seats.index", compact('data', 'seats', 'fullRows', 'showtimes'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Xác thực dữ liệu
        $validated = $request->validate([
            'showtime_id' => 'required|integer',
            'place' => 'required|string',
            'price' => 'required|numeric',
            'status' => 'required|string',
        ]);

        // Kiểm tra ghế đã tồn tại
        $existingSeat = Seat::where('showtime_id', $validated['showtime_id'])
            ->where('place', $validated['place'])
            ->first();

        if ($existingSeat) {
            return response()->json(['message' => 'Ghế đã tồn tại'], 400);
        }

        // Tạo mới ghế nếu chưa tồn tại
        $data = Seat::create([
            'showtime_id' => $validated['showtime_id'],
            'place' => $validated['place'],
            'price' => $validated['price'],
            'status' => $validated['status'],
        ]);
        return response()->json($data);
    }

    public function store1(Request $request)
    {
        // Validate input data
        $validated = $request->validate([
            'showtime_id' => 'required|integer',
            'row' => 'required|string|max:1', // Ensures only single character for rows
            'price' => 'required|numeric',
            'status' => 'required|string',
        ]);

        // Convert row to uppercase
        $row = strtoupper($validated['row']);
        $seatsToCreate = []; // Array to hold new seats to be created

        // Loop through the seats in the row (1 to 18)
        for ($i = 1; $i <= 18; $i++) {
            $place = $row . $i;

            // Check if the seat already exists in the database
            $existingSeat = Seat::where('showtime_id', $validated['showtime_id'])
                ->where('place', $place)
                ->first();

            if ($existingSeat) {
                // If the seat exists, update the price only
                $existingSeat->update(['price' => $validated['price']]);
            } else {
                // Otherwise, prepare the seat for insertion
                $seatsToCreate[] = [
                    'showtime_id' => $validated['showtime_id'],
                    'place' => $place,
                    'price' => $validated['price'],
                    'status' => $validated['status'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert new seats into the database if there are any
        if (!empty($seatsToCreate)) {
            Seat::insert($seatsToCreate);
        }

        // Prepare and return response
        return response()->json([
            'message' => 'Seats processed successfully',
            'added_seats' => $seatsToCreate,
            'updated_seats_count' => 18 - count($seatsToCreate), // Number of seats updated instead of created
        ], 200);
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $place)
    {

        // Xác thực `showtime_id` từ request body
        $request->validate([
            'showtime_id' => 'required|integer',
        ]);

        // Tìm ghế dựa vào `place` và `showtime_id`
        $seat = Seat::where('place', $place)
            ->where('showtime_id', $request->showtime_id)
            ->first();

        if (!$seat) {
            return response()->json(['message' => 'Ghế không tồn tại'], 404);
        }

        return response()->json($seat);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request)
    {
        $showtime_id = $request->input('showtime_id');
        // Lấy tất cả các input từ form
        $seatStatuses = $request->all();

        foreach ($seatStatuses as $name => $status) {
            if (preg_match('/^[ABCDEFGIJKL][1-9]|1[0-8]$/', $name) && $status !== null && $status !== '') {
                Seat::where('place', $name)->where('showtime_id', $showtime_id)->update(['status' => $status]);
            }
        }

        return redirect()->route('admin.seat.index', ['showtime' => $showtime_id]);
    }

    public function updateSeat(Request $request, $place)
    {
        $validated = $request->validate([
            'showtime_id' => 'required|integer',
            'place' => 'required|string',
            'price' => 'required|numeric',
            'status' => 'required|string',
        ]);

        // Kiểm tra ghế đã tồn tại
        $existingSeat = Seat::where('showtime_id', $validated['showtime_id'])
            ->where('place', $validated['place'])
            ->first();

        if ($existingSeat) {
            // Cập nhật thông tin ghế nếu đã tồn tại
            $existingSeat->update([
                'place' => $validated['place'],
                'price' => $validated['price'],
                'status' => $validated['status'],
            ]);

            return response()->json($existingSeat);
        }

        // Nếu ghế không tồn tại, trả về thông báo lỗi
        return response()->json(['message' => 'Ghế không tồn tại.'], 404);
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $seatStatuses = $request->all();

        foreach ($seatStatuses as $name => $status) {
            if (preg_match('/^[ABCDEFGIJKL][1-9]|1[0-8]$/', $name) && $status == null && $status == '') {
                Seat::where('place', $name)->where('showtime_id', $id)->delete();
            }
        }

        return redirect()->route('admin.seat.index', ['showtime' => $id]);
    }
}
