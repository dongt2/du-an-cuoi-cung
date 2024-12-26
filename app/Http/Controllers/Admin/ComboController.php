<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreComboRequest;
use App\Http\Requests\UpdateComboRequest;
use App\Models\Combo;
use Illuminate\Http\Request;

class ComboController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Combo::all();

        return view('admin.combo.index', compact('data'));
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
    public function store(StoreComboRequet $request)
    {
        $path = null;

        if($request->hasFile('image')){
            $image = $request->file('image');

            $newName = time(). '.' .$image->getClientOriginalExtension();

            $path = $image->storeAs('images/combo', $newName, 'public');
        }

        $data = [
            'combo_name' => $request->combo_name,
            'image'      => $path,
            'short_description' => $request->short_description,
            'price' => $request->price,
        ];

        Combo::create($data);

        return redirect()->route('admin.combo.index')->with('success', 'Thao tác thành công');
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
        $data = Combo::findOrFail($id);

        return view('admin.combo.update', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComboRequest $request, string $id)
    {
        $com = Combo::findOrFail($id);

        $path = $com->image;

        if($request->hasFile('image')){
            $image = $request->file('image');

            $newName = time(). '.' .$image->getClientOriginalExtension();

            $path = $image->storeAs('images/combo', $newName, 'public');
        }

        $data = [
            'combo_name' => $request->combo_name,
            'image'      => $path,
            'short_description' => $request->short_description,
            'price' => $request->price,
        ];

        $com->update($data);

        return redirect()->route('admin.combo.index')->with('success', 'Thao tác thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $com = Combo::findOrFail($id);

        $com->delete();

        return redirect()->route('admin.combo.index')->with('success', 'Thao tác thành công');
    }
}
