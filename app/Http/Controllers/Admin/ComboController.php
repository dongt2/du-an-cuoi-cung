<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Combo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComboController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Combo::all();
        return view('admin.combo.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.combo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'combo_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'short_description' => 'required|string|max:1500',
            'price' => 'required|integer|min:0',
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $newName = time() . '.' . $image->getClientOriginalName();

            $path = $image->storeAs('images/combo', $newName, 'public');
        }

        $data = [
            'combo_name' => $request->combo_name,
            'image' => $path,
            'short_description' => $request->short_description,
            'price' => $request->price,
        ];
        Combo::create($data);
        return redirect()->route('admin.combo.index');
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
        $data = Combo::where('combo_id', $id)->first();
        return view('admin.combo.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'combo_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'short_description' => 'required|string|max:1500',
            'price' => 'required|integer|min:0',
        ]);

        $combo = Combo::where('combo_id', $id)->first();
        $path = $combo->image;

        if ($request->hasFile('image')) {
            // Xóa ảnh cũ
            Storage::disk('public')->delete($path);

            //Lưu ảnh mới
            $image = $request->file('image');
            $newName = time() . '.' . $image->getClientOriginalName();

            $path = $image->storeAs('images/combo', $newName, 'public');
        }

        $data = [
            'combo_name' => $request->combo_name,
            'image' => $path,
            'short_description' => $request->short_description,
            'price' => $request->price,
        ];
        $combo->update($data);
        return redirect()->route('admin.combo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Combo::where('combo_id', $id)->delete();
        return redirect()->route('admin.combo.index');
    }
}
