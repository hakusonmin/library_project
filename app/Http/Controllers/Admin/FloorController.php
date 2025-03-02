<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFloorRequest;
use App\Http\Requests\UpdateHallRequest;
use App\Models\Floor;

class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $hall)
    {
        $floors = Floor::where('hall_id', $hall)->get();
        return view('web.admin.floor.index', compact('floors', 'hall'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $hall)
    {
        return view('web.admin.floor.create', compact('hall'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFloorRequest $request, string $hall)
    {
        $model = new Floor();
        $model->name = $request->name;
        $model->hall_id = $hall;
        $model->save();

        return redirect()
            ->route('admin.floors.index', ['hall' => $hall])
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
    public function edit(string $hall, string $id)
    {
        $floor = Floor::findOrFail($id);
        return view('web.admin.floor.edit', compact('floor', 'hall'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHallRequest $request, string $id, string $hall)
    {
        $model = Floor::find($id);
        $model->name = $request->name;
        $model->hall_id = $hall;
        $model->save();

        return redirect()
            ->route('admin.floors.index', ['hall' => $hall])
            ->with([
                'message' => '階情報を変更しました',
                'status' => 'info'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, string $hall)
    {
        $model = Floor::findOrFail($id);
        $model->delete();
        return redirect()
            ->route('admin.floors.index', ['hall' => $hall])
            ->with('message', '階情報を削除しました');
    }
}
