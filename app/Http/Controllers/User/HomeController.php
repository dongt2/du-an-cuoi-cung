<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Movie;
use App\Models\Showtime;
use App\Models\Review;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function listMovie()
    {
        if (session()->has('movie')) {
            session()->forget('movie');
        }
        if (session()->has('booking')) {
            session()->forget('booking');
        }

        $data = Movie::withCount([
            'reviews as reviews_today' => function ($query) {
                $query->whereDate('created_at', now()->toDateString()); // Only today's reviews
            }
        ])
            ->with('categories', 'actors', 'directors')
            ->orderByDesc('release_date') // Sort by today's reviews count
            ->take(8)
            ->get();
//        dd($data);

        $todayTheBestChoice = Ticket::join('movies', 'tickets.movie_id', '=', 'movies.movie_id') // Assuming tickets are linked to movies
        ->whereDate('tickets.created_at', now()->toDateString()) // Filter tickets sold today
        ->selectRaw('tickets.movie_id, movies.title, COUNT(*) as ticket_count') // Select movie_id, title, and count of tickets
        ->groupBy('tickets.movie_id', 'movies.title') // Group by movie_id and movie title
        ->orderBy('ticket_count', 'DESC') // Order by ticket count in descending order
        ->limit(6) // Limit to top 10 movies
        ->get();
//        dd($todayTheBestChoice);
        return view('user.home.home', compact('data', 'todayTheBestChoice'));
    }

    // Hiển thị danh sách thể loại
    public function categories(Request $request)
    {
        $categories = Category::all(); // Lấy danh sách thể loại
        $movies = Movie::query();

        // Áp dụng bộ lọc nếu có
        if ($request->has('category') && $request->category) {
            $movies->where('category_id', $request->category);
        }

        if ($request->has('year') && $request->year) {
            $movies->whereYear('release_date', $request->year);
        }

        if ($request->has('director') && $request->director) {
            $movies->where('director', $request->director);
        }

        if ($request->has('actors') && $request->actors) {
            $movies->where('actors', $request->actors);
        }

        if ($request->has('sort') && $request->sort) {
            if ($request->sort === 'most_viewed') {
                $movies->orderBy('views', 'desc');
            } elseif ($request->sort === 'newest') {
                $movies->orderBy('release_date', 'desc');
            }
        }

        $movies = $movies->get(); // Lấy danh sách phim sau khi lọc

        return view('user.movie.categories', compact('categories', 'movies'));
    }

    public function upcoming(Request $request)
    {
        // Lấy ngày hiện tại
        $today = Carbon::now();

        // Query phim sắp chiếu (release_date lớn hơn ngày hiện tại)
        $movies = Movie::query()
            ->where('release_date', '>', $today);

        // dd($movies);
        // Lọc theo thể loại
        if ($request->has('category') && $request->category) {
            $movies->where('category_id', $request->category);
        }

        // Lọc theo năm
        if ($request->has('year') && $request->year) {
            $movies->whereYear('release_date', $request->year);
        }

        // Lọc theo đạo diễn
        if ($request->has('director') && $request->director) {
            $movies->where('director', $request->director);
        }

        if ($request->has('actors') && $request->actors) {
            $movies->where('actors', $request->actors);
        }

        // Sắp xếp nếu có yêu cầu
        if ($request->has('sort') && $request->sort) {
            if ($request->sort === 'most_viewed') {
                $movies->orderBy('views', 'desc');
            } elseif ($request->sort === 'newest') {
                $movies->orderBy('release_date', 'desc');
            }
        }

        // Lấy danh sách thể loại để hiển thị
        $categoriesUpcoming = Category::all();

        // Lấy danh sách đạo diễn và diễn viên duy nhất
        $directors = Movie::select('director')->distinct()->pluck('director');
        $actors = Movie::select('actors')->distinct()->pluck('actors');

        // Phân trang kết quả
        // $movies = $movies->paginate(10);
        $movies = $movies->get();

        // Trả về view kèm danh sách phim sắp chiếu
        return view('user.movie.upcoming', compact('movies', 'categoriesUpcoming', 'directors', 'actors'));
    }

    public function index(Request $request)
    {

        $query = $request->input('query'); // Lấy từ khóa tìm kiếm từ request

        if ($query) {
            // Nếu có từ khóa, tìm kiếm phim theo tên
            $movies = Movie::where('title', 'LIKE', '%' . $query . '%')->get();
        } else {
            // Nếu không có từ khóa, hiển thị danh sách tất cả phim
            $movies = Movie::get();
        }
        // Xóa session nếu có
        if (session()->has('movie')) {
            session()->forget('movie');
        }
        if (session()->has('booking')) {
            session()->forget('booking');
        }

        // Trả về view với danh sách phim
        return view('user.movie.list', compact('movies'));
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
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        // Nếu muốn kiểm tra bình luận chứa từ ngữ không phù hợp
        $badWords = ['CỨT', 'Cứt', 'cỨt', 'cứT', 'CỨT'];
        foreach ($badWords as $badWord) {
            if (stripos($request->comment, $badWord) !== false) {
                return back()->withErrors(['errorComment' => 'Bình luận không được chứa từ ngữ không phù hợp.']);
            }
        }

        Review::create([
            'movie_id' => $request->movie_id,
            'user_id' => auth()->id(),
            'review_date' => now()->toDateString(),
            'review_time' => now()->toTimeString(),
            'comment' => $request->comment,
        ]);

        return redirect()->route('movie.show', ['movie' => $request->movie_id]);
    }


    /**
     * Display the specified resource.
     */



    public function show(string $id)
    {
        if (session()->has('movie')) {
            session()->forget('movie');
        }
        if (session()->has('booking')) {
            session()->forget('booking');
        }
        // $time_showtime = Showtime::where('movie_id', $id)
        // ->select('time')
        // ->get();

        // $time_movie = Movie::where('movie_id', $id)
        // ->select('duration')
        // ->get();
        // $time_format = $time_movie[0]->duration;
        // $time_format = explode(":", $time_format);
        // $time_format = $time_format[0] * 60 + $time_format[0];
        // $time_format = $time_format + 15;
        // $time_format = gmdate("H:i", $time_format);
        // $time_format = explode(":", $time_format);
        // $time_format = $time_format[0] * 60 + $time_format[0];
        // $time_format = $time_format * 60;
        // $time_format = $time_format + strtotime($time_showtime[0]->time);
        // $time_format = date("H:i", $time_format);




        // dd($time_format);

        $data = Movie::where('movie_id', $id)
            ->with('categories', 'actors', 'directors')
            ->first();
//        dd($data);
        $reviews = Review::where('movie_id', $id)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get();
        $showtimes = Showtime::where('movie_id', $id)
            ->with('screen')
            ->orderBy('showtime_date')
            ->orderBy('screen_id')
            ->orderBy('time')
            ->get()

            ->groupBy(function ($item) {
                return $item->showtime_date . ' - ' . $item->screen->screen_name;
            });
        if(isset(Auth::user()->user_id)){
            $ticket = Ticket::where('user_id', Auth::user()->user_id)
            ->select('token');
        } else {
            $ticket = null;
        }
//    dd($ticket);
        $movie_id = $id;
        return view('user.movie.show', compact('data', 'reviews', 'showtimes', 'movie_id', 'ticket'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
