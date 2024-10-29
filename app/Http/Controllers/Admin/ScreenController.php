<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ScreenRequest;
use App\Models\Screen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScreenController extends Controller
{
    public function index()
    {
        $listScreens = Screen::query()->latest('screen_id')->paginate(10);
        return view('admin.screens.index', ['listScreens' => $listScreens]);
    }
    public function create()
    {
        return view('admin.screens.create');
    }
    public function store(ScreenRequest $request)
    {
        try {
            // Lưu vào data
            $data = [
                'screen_name' => $request->screen_name
            ];
            // dd($data);
            Screen::create($data);

            // Redirect với thông báo thành công
            return redirect()->route('admin.screen.index')->with('message', 'Thêm mới thành công');
        } catch (\Exception $e) {
            // Xử lý ngoại lệ nếu có lỗi khi lưu dữ liệu
            return redirect()->back()->withErrors(['error' => 'Đã xảy ra lỗi trong quá trình lưu dữ liệu.']);
        }
    }
    public function edit($screen_id)
    {
        $screen = Screen::find($screen_id);
        return view('admin.screens.update', ['screen' => $screen]);
    }
    public function update(ScreenRequest $request, $screen_id)
    {
        $screen = Screen::find($screen_id);
        try {
            // Lưu vào data
            $data = [
                'screen_name' => $request->screen_name
            ];
            // dd($data);
            $screen->update($data);

            // Redirect với thông báo thành công
            return redirect()->route('admin.screens.index')->with('message', 'Thêm mới thành công');
        } catch (\Exception $e) {
            // Xử lý ngoại lệ nếu có lỗi khi lưu dữ liệu
            return redirect()->back()->withErrors(['error' => 'Đã xảy ra lỗi trong quá trình lưu dữ liệu.']);
        }
    }
    public function destroy($screen_id)
    {
        $screen = Screen::find($screen_id);
        
        $screen->delete();
        return redirect()->route('admin.screen.index');
    }
}
