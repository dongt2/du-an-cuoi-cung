<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Screen;
use Illuminate\Http\Request;

class ScreenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Screen::all();
        return view('admin.screen.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.screen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'screen_name' => 'required|string|max:255',
        ]);

        $data = [
            'screen_name' => $request->screen_name,
        ];

        Screen::create($data);
        return redirect()->route('admin.screen.index');
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
    public function edit(string $id)
    {
        $data = Screen::where('screen_id', $id)->first();
        return view('admin.screen.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'screen_name' => 'required|string|max:255',
        ]);

        $screen = Screen::where('screen_id', $id)->first();

        $data = [
            'screen_name' => $request->screen_name,
        ];
        $screen->update($data);
        return redirect()->route('admin.screen.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Screen::where('Screen_id', $id)->delete();
        return redirect()->route('admin.screen.index');
    }
}
