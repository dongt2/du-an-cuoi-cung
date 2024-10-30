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
        try {
            // Lấy giá trị từ request
            $hours = $request->input('hours');
            $minutes = $request->input('minutes');

            // Kiểm tra xem cả hai trường hours và minutes có được cung cấp không
            if (is_null($hours) || is_null($minutes)) {
                return redirect()->back()->withErrors(['time' => 'Trường thời gian không được để trống.']);
            }

            // Chuyển đổi thành định dạng H:i
            $hours = str_pad($hours, 2, '0', STR_PAD_LEFT);  // Đảm bảo có 2 chữ số
            $minutes = str_pad($minutes, 2, '0', STR_PAD_LEFT);
            $time = "{$hours}:{$minutes}";

            // Xác thực dữ liệu từ request
            $validatedData = $request->validate([
                'movie_id' => 'required|exists:movies,movie_id',
                'screen_id' => 'required|exists:screens,screen_id',
                'showtime_date' => 'required|date',
                // Bỏ yêu cầu time ở đây, vì nó sẽ được tính toán từ hours và minutes
            ]);

            // Thêm time vào validatedData
            $validatedData['time'] = $time;

            // Lưu dữ liệu vào cơ sở dữ liệu
            Showtime::create($validatedData);

            return redirect()->route('admin.showtime.index')->with('message', 'Thêm mới thành công');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    public function edit($showtime_id)
    {
        // Tìm Showtime dựa trên ID
        $showtime = Showtime::find($showtime_id);

        // Kiểm tra nếu showtime không tìm thấy
        if (!$showtime) {
            return redirect()->route('admin.showtime.index')->withErrors(['showtime' => 'Không tìm thấy bản ghi.']);
        }

        // Chuyển đổi hours và minutes thành số nguyên
        $showtime->hours = (int)$showtime->hours;
        $showtime->minutes = (int)$showtime->minutes;

        // Lấy danh sách screens và movies
        $listScreens = Screen::all(); // Sử dụng model thay vì DB facade
        $listMovies = Movie::all();   // Sử dụng model thay vì DB facade

        // Trả về view với dữ liệu cần thiết
        return view('admin.showtimes.update', [
            'showtime' => $showtime,
            'listScreens' => $listScreens,
            'listMovies' => $listMovies,
        ]);
    }


    public function update(Request $request, $showtime_id)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'movie_id' => 'required|exists:movies,movie_id',
            'screen_id' => 'required|exists:screens,screen_id',
            'showtime_date' => 'required|date',
            'hours' => 'required|integer|min:0|max:23',
            'minutes' => 'required|integer|min:0|max:59'
        ]);

        // Tìm Showtime dựa trên ID
        $showtime = Showtime::find($showtime_id);

        // Kiểm tra nếu showtime không tìm thấy
        if (!$showtime) {
            return redirect()->route('admin.showtime.index')->withErrors(['showtime' => 'Không tìm thấy bản ghi.']);
        }

        // Tính toán tổng thời gian chiếu phim
        $totalMinutes = (int)$request->hours * 60 + (int)$request->minutes;

        // Cập nhật thông tin lịch chiếu
        $showtime->movie_id = $request->movie_id;
        $showtime->screen_id = $request->screen_id;
        $showtime->showtime_date = $request->showtime_date;
        $showtime->time = $totalMinutes; // Lưu tổng thời gian

        // Lưu lại các thay đổi
        $showtime->save();

        // Chuyển hướng về danh sách với thông báo thành công
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
