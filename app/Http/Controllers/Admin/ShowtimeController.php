<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowtimeRequest;
use App\Models\Movie;
use App\Models\Screen;
use App\Models\Showtime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ShowtimeController extends Controller
{
    public function index()
    {
        $data = DB::table('showtimes')
            ->join('movies', 'movies.movie_id', '=', 'showtimes.movie_id')
            ->join('screens', 'screens.screen_id', '=', 'showtimes.screen_id')
            ->select('showtimes.showtime_id', 'movies.title as movie_title', 'screens.screen_name as screen_name', 'showtimes.showtime_date', 'showtimes.time')
            ->orderByDesc('showtimes.showtime_id')
            ->paginate(10);

        // Kiểm tra nếu không có dữ liệu
        if ($data->isEmpty()) {
            // Xử lý khi không có dữ liệu
            return response()->json(['message' => 'Không có dữ liệu'], 404);
        }


        $data->transform(function ($item) {
            $item->showtime_date = Carbon::parse($item->showtime_date)->format('d/m/Y');
            return $item;
        });
        // dd($data);
        $listScreens = DB::table('screens')->get();
        $listMovies = DB::table('movies')->get();



        return view('admin.showtimes.index', compact('data'));
    }
    public function create()
    {
        $listScreens = DB::table('screens')->get();
        $listMovies = DB::table('movies')->get();
        // dd($listScreens);
        return view('admin.showtimes.create', compact('listScreens', 'listMovies'));
    }
    public function store(Request $request)
    {
        // Debugging: Kiểm tra dữ liệu nhận được
        // dd($request->all());

        // Validate dữ liệu
        $request->validate([
            'movie_id' => 'required|exists:movies,movie_id',
            'screen_id' => 'required|exists:screens,screen_id',
            'showtime_date' => 'required|date_format:d/m/Y', // Định dạng ngày nhập vào
            'hours' => 'required|integer|min:0|max:23',
            'minutes' => 'required|integer|min:0|max:59',
            'seconds' => 'required|integer|min:0|max:59'
        ]);

        // Chuyển đổi định dạng ngày từ d/m/Y sang Y-m-d
        $date = \Carbon\Carbon::createFromFormat('d/m/Y', $request->showtime_date)->format('Y-m-d');

        // Tính tổng thời gian chiếu
        $totalSeconds = ($request->hours * 3600) + ($request->minutes * 60) + $request->seconds;

        // Lưu vào cơ sở dữ liệu
        Showtime::create([
            'movie_id' => $request->movie_id,
            'screen_id' => $request->screen_id,
            'showtime_date' => $date,
            'time' => $totalSeconds, // Lưu tổng thời gian tính bằng giây
        ]);

        return redirect()->route('admin.showtime.index')->with('message', 'Thêm lịch chiếu thành công');
    }




    public function edit($showtime_id)
    {
        // Tìm Showtime dựa trên ID
        $showtime = Showtime::find($showtime_id);

        // Kiểm tra nếu showtime không tìm thấy
        if (!$showtime) {
            return redirect()->route('admin.showtime.index')->withErrors(['showtime' => 'Không tìm thấy bản ghi.']);
        }

        // Lấy danh sách screens và movies
        $listScreens = Screen::all();
        $listMovies = Movie::all();

        // Trả về view với dữ liệu cần thiết
        return view('admin.showtimes.update', [
            'showtime' => $showtime, // Giữ nguyên đối tượng showtime, bao gồm thời gian
            'listScreens' => $listScreens,
            'listMovies' => $listMovies,
        ]);
    }

    public function update(Request $request, $showtime_id)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'movie_id' => 'required|exists:movies,movie_id',
            'screen_id' => 'required|exists:screens,screen_id',
            'showtime_date' => 'required|date',
            'time' => 'required|string' // giả định time là định dạng chuỗi 'H:i:s'
        ]);

        // Tìm Showtime dựa trên ID
        $showtime = Showtime::find($showtime_id);

        // Kiểm tra nếu showtime không tìm thấy
        if (!$showtime) {
            return redirect()->route('admin.showtime.index')->withErrors(['showtime' => 'Không tìm thấy bản ghi.']);
        }

        // Cập nhật thông tin lịch chiếu
        $showtime->movie_id = $request->movie_id;
        $showtime->screen_id = $request->screen_id;
        $showtime->showtime_date = $request->showtime_date;
        $showtime->time = $request->time; // Lưu thời gian theo định dạng đã nhận

        // Lưu thay đổi
        $showtime->save();

        return redirect()->route('admin.showtime.index')->with('message', 'Cập nhật thành công');
    }




    public function destroy($showtime_id)
    {
        // Tìm bản ghi Showtime dựa trên ID
        $showtime = Showtime::find($showtime_id);

        // Kiểm tra xem bản ghi có tồn tại không
        if (!$showtime) {
            return redirect()->route('admin.showtime.index')->withErrors(['showtime' => 'Không tìm thấy bản ghi để xóa.']);
        }

        // Xóa bản ghi
        $showtime->delete();

        // Chuyển hướng với thông báo thành công
        return redirect()->route('admin.showtime.index')->with('message', 'Xóa lịch chiếu thành công.');
    }
}
