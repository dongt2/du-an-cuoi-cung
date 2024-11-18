<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        //hiển thị danh sách phim 
        $movies = Movie::all();
        return view('movies.index',compact('movies')); 
    }
      // hiển thị chi tiết phim 
    public function show($id){
        $movie=Movie::findOrFail($id);
        return view('movies.show',compact('movies')); 
    }

    //Đặt vé cho phim
    public function bookTicket(Request $request, $id)
{
    $request->validate([
        'number_of_tickets' => 'required|integer|min:1', // Validating số lượng vé
    ]);

    $movie = Movie::findOrFail($id);
    // Logic đặt vé (lưu vào cơ sở dữ liệu, gửi thông báo, v.v.)
    
    return redirect()->route('movies.index')->with('success', 'Đặt vé thành công!');
}
    
}
