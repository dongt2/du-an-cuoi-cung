<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Models\Category;
use App\Models\Director;
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
    public function listMovie()
    {
        session()->forget(['movie', 'booking']);

        $data = Cache::remember('listMovie', 60, function () {
            return Movie::withCount([
                'reviews as reviews_today' => function ($query) {
                    $query->whereDate('created_at', now()->toDateString());
                }
            ])
                ->with(['categories', 'actors', 'directors', 'reviews', 'showtimes' => function ($query) {
                    // Filter by today's showtimes and sort them
                    $query->whereDate('showtime_date', now()->toDateString())
                        ->orderBy('time');
                }])
                ->whereHas('showtimes', function ($query) {
                    // Only include movies that have showtimes today
                    $query->whereDate('showtime_date', now()->toDateString());
                })
                ->orderByRaw("(select MIN(showtimes.time) from showtimes where showtimes.movie_id = movies.movie_id and showtimes.showtime_date = ?) asc", [now()->toDateString()])
                ->take(8)
                ->get();
        });
//dd($data);
        $todayTheBestChoice = Cache::remember('todayTheBestChoice', 60, function () {
            return Ticket::join('movies', 'tickets.movie_id', '=', 'movies.movie_id')
                ->whereDate('tickets.created_at', now()->toDateString())
                ->selectRaw('tickets.movie_id, movies.title, COUNT(*) as ticket_count')
                ->groupBy('tickets.movie_id', 'movies.title')
                ->orderBy('ticket_count', 'DESC')
                ->limit(6)
                ->get();
        });
//    dd($todayTheBestChoice);
        return view('user.home.home', compact('data', 'todayTheBestChoice'));
    }

    public function categories(Request $request)
    {
        $categories = Category::all();
        $directors = Director::all();
        $actors = Actor::all();
        $movies = Movie::query();

        if ($request->has('category') && $request->category) {
            $movies->whereHas('categories', function ($query) use ($request) {
                $query->where('categories.category_id', $request->category);
            });
        }

        if ($request->has('year') && $request->year) {
            $movies->whereYear('release_date', $request->year);
        }

        if ($request->has('director') && $request->director) {
            $movies->whereHas('directors', function ($query) use ($request) {
                $query->where('directors.id', $request->director);
            });
        }

        if ($request->has('actors') && $request->actors) {
            $movies->whereHas('actors', function ($query) use ($request) {
                $query->where('actors.id', $request->actors);
            });
        }

        if ($request->has('sort') && $request->sort) {
            if ($request->sort === 'most_viewed') {
                $movies->orderBy('views', 'desc');
            } elseif ($request->sort === 'newest') {
                $movies->orderBy('release_date', 'desc');
            }
        }

        $movies = $movies->get();

        return view('user.movie.categories', compact('categories', 'directors', 'actors', 'movies'));
    }

    public function upcoming(Request $request)
    {
        $today = Carbon::now();
        $movies = Movie::with('showtimes')
            ->whereHas('showtimes', function ($query) use ($today) {
                $query->where('showtime_date', '>', $today->toDateString());
            });

        if ($request->has('category') && $request->category) {
            $movies->whereHas('categories', function ($query) use ($request) {
                $query->where('categories.category_id', $request->category);
            });
        }

        if ($request->has('year') && $request->year) {
            $movies->whereYear('release_date', $request->year);
        }

        if ($request->has('director') && $request->director) {
            $movies->whereHas('directors', function ($query) use ($request) {
                $query->where('directors.id', $request->director);
            });
        }

        if ($request->has('actors') && $request->actors) {
            $movies->whereHas('actors', function ($query) use ($request) {
                $query->where('actors.id', $request->actors);
            });
        }

        if ($request->has('sort') && $request->sort) {
            if ($request->sort === 'most_viewed') {
                $movies->orderBy('views', 'desc');
            } elseif ($request->sort === 'newest') {
                $movies->orderBy('release_date', 'desc');
            }
        }

        $categoriesUpcoming = Category::all();
        $directors = Director::all();
        $actors = Actor::all();
        $movies = $movies->get();
//    dd($movies);
        return view('user.movie.upcoming', compact('movies', 'categoriesUpcoming', 'directors', 'actors'));
    }

    public function index(Request $request)
    {
        $categories = Category::all(); // Lấy danh sách thể loại
        $directors = Director::all(); // Lấy danh sách đạo diễn
        $actors = Actor::all(); // Lấy danh sách diễn viên

        $movies = Movie::query(); // Khởi tạo query builder
        $query = $request->input('query'); // Lấy từ khóa tìm kiếm từ request

        // Nếu có từ khóa, tìm kiếm phim theo tên
        if ($query) {
            $movies->where('title', 'LIKE', '%' . $query . '%');
        }

        // Áp dụng bộ lọc nếu có
        if ($request->has('category') && $request->category) {
            $movies->whereHas('categories', function ($query) use ($request) {
                $query->where('categories.category_id', $request->category);
            });
        }

        if ($request->has('year') && $request->year) {
            $movies->whereYear('release_date', $request->year);
        }

        if ($request->has('director') && $request->director) {
            $movies->whereHas('directors', function ($query) use ($request) {
                $query->where('directors.id', $request->director);
            });
        }

        if ($request->has('actors') && $request->actors) {
            $movies->whereHas('actors', function ($query) use ($request) {
                $query->where('actors.id', $request->actors);
            });
        }

        // Sắp xếp nếu có
        if ($request->has('sort') && $request->sort) {
            if ($request->sort === 'most_viewed') {
                $movies->orderBy('views', 'desc');
            } elseif ($request->sort === 'newest') {
                $movies->orderBy('release_date', 'desc');
            }
        }

        // Lấy danh sách phim sau khi áp dụng tất cả bộ lọc
        $movies = $movies->get();

        session()->forget(['movie', 'booking']);

        // Trả về view với danh sách phim
        return view('user.movie.list', compact('categories', 'directors', 'actors', 'movies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

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

    public function show(string $id)
    {
        session()->forget(['movie', 'booking']);

        $data = Movie::where('movie_id', $id)
            ->with(['categories', 'actors', 'directors'])
            ->first();

        $reviews = Review::where('movie_id', $id)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        $showtimes = Showtime::upcoming()
            ->where('movie_id', $id)
            ->where(function ($query) {
                $query->where('showtime_date', '>', now()->toDateString())
                    ->orWhere(function ($subQuery) {
                        $subQuery->where('showtime_date', now()->toDateString())
                            ->where('time', '>', now()->addMinutes(15)->format('H:i:s'));
                    });
            })
            ->with('screen')
            ->orderBy('showtime_date')
            ->orderBy('screen_id')
            ->orderBy('time')
            ->get()
            ->groupBy(function ($item) {
                return $item->showtime_date . ' - ' . $item->screen->screen_name;
            });

        $ticket = Auth::check() ? Ticket::where('user_id', Auth::user()->user_id)->select('token')->first() : null;

        return view('user.movie.show', compact('data', 'reviews', 'showtimes', 'id', 'ticket'));
    }
}
