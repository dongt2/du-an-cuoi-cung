<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\seat;
use App\Models\screen;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $screen = Screen::get();
        if (!$request->has('screen')) {
            return redirect()->route('seat.index', ['screen' => 1]);
        }
        $screen_id = $request->input('screen');

        $data = Seat::where('screen_id', $screen_id)
            ->select('place', 'status')
            ->orderByRaw("SUBSTRING(place, 1, 1), CAST(SUBSTRING(place, 2) AS UNSIGNED)")
            ->get();

        return view("admin.seats.list", compact("data", "screen"));
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
            'screen_id' => 'required|integer',
            'place' => 'required|string',
            'price' => 'required|numeric',
            'status' => 'required|string',
        ]);

        // Kiểm tra ghế đã tồn tại
        $existingSeat = Seat::where('screen_id', $validated['screen_id'])
            ->where('place', $validated['place'])
            ->first();

        if ($existingSeat) {
            return response()->json(['message' => 'Ghế đã tồn tại'], 400); // Trả về mã lỗi 400 nếu ghế đã tồn tại
        }

        // Tạo mới ghế nếu chưa tồn tại
        $data = Seat::create([
            'screen_id' => $validated['screen_id'],
            'place' => $validated['place'],
            'price' => $validated['price'],
            'status' => $validated['status'],
        ]);

        return response()->json($data);
    }



    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $place)
    {

        // Xác thực `screen_id` từ request body
        $request->validate([
            'screen_id' => 'required|integer',
        ]);

        // Tìm ghế dựa vào `place` và `screen_id`
        $seat = Seat::where('place', $place)
            ->where('screen_id', $request->screen_id)
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
        $screen_id = $request->input('screen_id');

        // Lấy tất cả các input từ form
        $seatStatuses = $request->all();

        foreach ($seatStatuses as $name => $status) {
            if (preg_match('/^[ABCDEFGIJKL][1-9]|1[0-8]$/', $name) && $status !== null && $status !== '') {
                Seat::where('place', $name)->where('screen_id', $screen_id)->update(['status' => $status]);
            }
        }

        return redirect()->route('seat.index', ['screen' => $screen_id]);
    }

    public function updateSeat(Request $request, $place)
    {
        $validated = $request->validate([
            'screen_id' => 'required|integer',
            'place' => 'required|string',
            'price' => 'required|numeric',
            'status' => 'required|string',
        ]);

        // Kiểm tra ghế đã tồn tại
        $existingSeat = Seat::where('screen_id', $validated['screen_id'])
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
        $screen_id = $request->input('screen_id');
        $seatStatuses = $request->all();

        foreach ($seatStatuses as $name => $status) {
            if (preg_match('/^[ABCDEFGIJKL][1-9]|1[0-8]$/', $name) && $status == null && $status == '') {
                Seat::where('place', $name)->where('screen_id', $screen_id)->delete();
            }
        }

        return redirect()->route('seat.index', ['screen' => $screen_id]);
    }
}
