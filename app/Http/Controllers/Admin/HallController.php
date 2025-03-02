<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHallRequest;
use App\Http\Requests\UpdateHallRequest;
use App\Models\Hall;
use Illuminate\Http\Request;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $halls = Hall::all();
        return view('web.admin.hall.index', compact('halls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('web.admin.hall.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHallRequest $request)
    {
        $model = new Hall();
        $model->name = $request->name;
        $model->save();

        return redirect()
        ->route('admin.halls.index')
        ->with([
            'message' => '図書館情報を登録しました',
            'status' => 'info'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Hall $hall)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hall $hall)
    {
        return view('web.admin.hall.edit', compact('hall'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHallRequest $request, Hall $hall)
    {
        $model = $hall;
        $model->name = $request->name;
        $model->save();

        return redirect()
        ->route('admin.halls.index')
        ->with([
            'message' => '図書館情報を変更しました',
            'status' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hall $hall)
    {
        $model = $hall;
        $model->delete();
        return redirect()->route('admin.halls.index')
            ->with('message', '図書館情報を削除しました');
    }
}
