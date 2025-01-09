<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreActorRequest;
use App\Http\Requests\UpdateActorRequest;
use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Actor::all();

        return view('admin.actor.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.actor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActorRequest $request)
    {
        $data = $request->all();

        $actor = Actor::create($data);

        if($actor){
            toastr()->success('Thao tác thành công');
        }else{
            toastr()->error('Thao tác không thành công. Vui lòng thử lại');
        }
        return redirect()->route('admin.actor.index');
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
        $data = Actor::findOrFail($id);

        return view('admin.actor.update', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActorRequest $request, string $id)
    {
        $actor = Actor::findOrFail($id);

        $data =$request->all();

        $actor->update($data);

        if($actor){
            toastr()->success('Thao tác thành công');
        }else{
            toastr()->error('Thao tác không thành công. Vui lòng thử lại');
        }

        return redirect()->route('admin.actor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $act = Actor::findOrFail($id);

        $actorCount = $act->actor()->count();

        if ($actorCount == 0) {
            $act->delete();

            toastr()->success('Thao tác thành công');
        }else{
            toastr()->error('Thao tác không thành công vì diễn viên này vẫn còn liên kết');
        }

        return back();

    }
}
