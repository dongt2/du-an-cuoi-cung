<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Combo;
use Illuminate\Http\Request;

class ComboController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Combo::paginate(10);

        return view('admin.combos.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.combos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'combo_name' => [
                'required',
                'unique:combos,combo_name',
            ],
            'price' => [
                'required',
            ],
        ],
            [
                'combo_name.required' => 'Không được bỏ trống',
                'combo_name.unique' => 'Tên combo đã tồn tại trong cơ sở dữ liệu',

                'price.required' => 'Không được bỏ trống',

            ]
        );

        $data = $request->all();

        Combo::query()->create($data);

        //dd($data);
        return redirect()->route('admin.combos.index')->with('success', 'Thao tác thành công');
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
        $data = Combo::all();
        return view('admin.combos.edit', compact('data'));
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
