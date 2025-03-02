<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFloorRequest;
use App\Http\Requests\UpdateHallRequest;
use App\Models\Hall;
use App\Models\Floor;


class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Hall $hall)
    {
        $floors = Floor::where('hall_id', $hall->id)->get();
        return view('web.admin.floor.index', compact('floors', 'hall'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Hall $hall)
    {
        return view('web.admin.floor.create', compact('hall'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFloorRequest $request, Hall $hall)
    {
        $model = new Floor();
        $model->name = $request->name;
        $model->hall_id = $hall->id;
        $model->save();

        return redirect()
            ->route('admin.floors.index', ['hall' => $hall->id])
            ->with([
                'message' => '階情報を登録しました',
                'status' => 'info'
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hall $hall, Floor $floor)
    {
        return view('web.admin.floor.edit', compact('floor', 'hall'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHallRequest $request, Hall $hall, Floor $floor)
    {
        $model = $floor;
        $model->name = $request->name;
        $model->hall_id = $hall->id;
        $model->save();

        return redirect()
            ->route('admin.floors.index', ['hall' => $hall->id])
            ->with([
                'message' => '階情報を変更しました',
                'status' => 'info'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hall $hall, Floor $floor)
    {
        $model = $floor;
        $model->delete();
        return redirect()
            ->route('admin.floors.index', ['hall' => $hall->id])
            ->with('message', '階情報を削除しました');
    }
}
