<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Seat;
use Illuminate\Http\Request;

class RealtimeController extends Controller
{
    public function getSeats()
    {
        $seats = Seat::where('showtime_id', 1)->get();
        return response()->json(['seats' => $seats]);
    }


    public function updateSeatStatus(Request $request)
    {
        $validated = $request->validate([
            'place' => 'required|string',
            'status' => 'required|string|in:available,Đang chọn,Đã đặt',
        ]);

        $seat = Seat::where('place', $validated['place'])->first();

        if ($seat) {
            $seat->status = $validated['status'];
            $seat->save();

            return response()->json(['success' => true, 'message' => 'Cập nhật trạng thái ghế thành công']);
        }

        return response()->json(['success' => false, 'message' => 'Ghế không tồn tại'], 404);
    }
}
