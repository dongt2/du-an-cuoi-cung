<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Movie;
use App\Models\Showtime;
use App\Models\Review;
use Illuminate\Http\Request;

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
        $data = Movie::orderBy('created_at', 'desc')->take(8)->get();
        return view('user.home.home', compact('data'));
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

    // Bộ lọc phim
    // public function filter(Request $request)
    // {
    //     $query = Movie::query();

    //     if ($request->has('actor') && $request->actor) {
    //         $query->where('actors', 'like', '%' . $request->actor . '%');
    //     }

    //     if ($request->has('director') && $request->director) {
    //         $query->where('director', 'like', '%' . $request->director . '%');
    //     }

    //     if ($request->has('year') && $request->year) {
    //         $query->whereYear('release_date', $request->year);
    //     }

    //     $movies = $query->with('category')->get();
    //     return view('movie.filter', compact('movies'));
    // }

    public function index()
    {
        if (session()->has('movie')) {
            session()->forget('movie');
        }
        if (session()->has('booking')) {
            session()->forget('booking');
        }
        $data = Movie::all();
        return view('user.movie.list', compact('data'));
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

        $data = Movie::where('movie_id', $id)->first();
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
        $movie_id = $id;
        return view('user.movie.show', compact('data', 'reviews', 'showtimes', 'movie_id'));
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
