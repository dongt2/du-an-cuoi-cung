<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreScreenRequest;
use App\Http\Requests\UpdateScreenRequest;
use App\Models\Screen;
use Illuminate\Http\Request;

class ScreenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Screen::orderBy('screen_id', 'desc')->get();

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
    public function store(StoreScreenRequest $request)
    {
        $data = [
            'screen_name' => $request->screen_name,
        ];

        Screen::create($data);

        return redirect()->route('admin.screen.index')->with('success', 'Thao tác thành công');
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
        $data = Screen::findOrFail($id);

        return view('admin.screen.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScreenRequest $request, string $id)
    {
        $screen = Screen::findOrFail($id);

        $data = [
            'screen_name' => $request->screen_name,
        ];
        $screen->update($data);

        return redirect()->route('admin.screen.index')->with('success', 'Thao tác thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $screen = Screen::findOrFail($id);

        $screen->delete();

        return redirect()->route('admin.screen.index')->with('success', 'Thao tác thành công');
    }
}
