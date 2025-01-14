<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShowtimeRequest;
use App\Http\Requests\UpdateShowtimeRequest;
use App\Models\Movie;
use App\Models\Screen;
use App\Models\Showtime;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ShowtimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Showtime::query()
            ->join('movies', 'movies.movie_id', '=', 'showtimes.movie_id')
            ->join('screens', 'screens.screen_id', '=', 'showtimes.screen_id')
            ->select('showtimes.showtime_id', 'movies.title as movie_title', 'screens.screen_name as screen_name', 'showtimes.showtime_date', 'showtimes.time')
            ->orderByDesc('showtimes.showtime_id')
            ->get();


        // dd($data);
        $listScreens = DB::table('screens')->get();
        $listMovies = DB::table('movies')->get();

        return view('admin.showtime.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listScreens = DB::table('screens')->get();
        $listMovies = DB::table('movies')->get();

        // dd($listScreens);
        return view('admin.showtime.create', compact('listScreens', 'listMovies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShowtimeRequest $request)
    {
        // Debugging: Kiểm tra dữ liệu nhận được
        // dd($request->all());

        // Chuyển đổi định dạng ngày từ d/m/Y sang Y-m-d nếu cần
        // $request->merge(['showtime_date' => ...]);

        // Lưu vào cơ sở dữ liệu

        $data = [
            'movie_id' => $request->movie_id,
            'screen_id' => $request->screen_id,
            'showtime_date' => $request->showtime_date,
            'time' => $request->time, // Lưu tổng thời gian tính bằng giây
        ];
        Showtime::create($data);
        // Phát sự kiện
        // event(new ShowtimesUpdated());

        return redirect()->route('admin.showtime.index')->with('success', 'Thao tác thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($showtime_id)
    {
        // Tìm Showtime dựa trên ID
        $showtime = Showtime::find($showtime_id);

        // Kiểm tra nếu showtime không tìm thấy
        if (! $showtime) {
            return redirect()->route('admin.showtime.index')->withErrors(['showtime' => 'Không tìm thấy bản ghi.']);
        }

        // Lấy danh sách screens và movies
        $listScreens = Screen::all();
        $listMovies = Movie::all();

        // Trả về view với dữ liệu cần thiết
        return view('admin.showtime.edit', [
            'showtime' => $showtime, // Giữ nguyên đối tượng showtime, bao gồm thời gian
            'listScreens' => $listScreens,
            'listMovies' => $listMovies,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShowtimeRequest $request, $showtime_id)
    {

        // Tìm Showtime dựa trên ID
        $showtime = Showtime::find($showtime_id);

        // Kiểm tra nếu showtime không tìm thấy
        if (! $showtime) {
            return redirect()->route('admin.showtime.index')->withErrors(['showtime' => 'Không tìm thấy bản ghi.']);
        }

        // Cập nhật thông tin lịch chiếu
        $showtime->movie_id = $request->movie_id;
        $showtime->screen_id = $request->screen_id;
        $showtime->showtime_date = $request->showtime_date;
        $showtime->time = $request->time; // Lưu thời gian theo định dạng đã nhận

        // Lưu thay đổi
        $showtime->save();

        return redirect()->route('admin.showtime.index')->with('success', 'Thao tác thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $showtime_id)
    {
        // Tìm bản ghi Showtime dựa trên ID
        $showtime = Showtime::find($showtime_id);

        // Kiểm tra xem bản ghi có tồn tại không
        if (! $showtime) {
            return redirect()->route('admin.showtime.index')->withErrors(['showtime' => 'Không tìm thấy bản ghi để xóa.']);
        }

        // Xóa bản ghi
        $showtime->delete();

        // Chuyển hướng với thông báo thành công
        return redirect()->route('admin.showtime.index')->with('success', 'Thao tác thành công');
    }

    public function trashed() {
        $data = Showtime::query()
            ->join('movies', 'movies.movie_id', '=', 'showtimes.movie_id')
            ->join('screens', 'screens.screen_id', '=', 'showtimes.screen_id')
            ->select('showtimes.showtime_id', 'movies.title as movie_title', 'screens.screen_name as screen_name', 'showtimes.showtime_date', 'showtimes.time')
            ->orderByDesc('showtimes.showtime_id')
            ->onlyTrashed()
            ->get();

        return view('admin.showtime.trashed', compact('data'));
    }

    public function restore(string $id) {
        $show = Showtime::withTrashed()->findOrFail($id);

        $show->restore();

        if($show){
            toastr()->success('Khôi phục dữ liệu thành công');
        }else{
            toastr()->error('Vui lòng thử lại');
        }

        return redirect()->route('admin.showtime.index');
    }

    public function forceDelete(string $id) {

        $show = Showtime::withTrashed()->findOrFail($id);

        $show->forceDelete();

        if($show){
            toastr()->success('Xóa dữ liệu thành công');
        }else{
            toastr()->error('Vui lòng thử lại');
        }

        return redirect()->route('admin.showtime.trashed');
    }
}
