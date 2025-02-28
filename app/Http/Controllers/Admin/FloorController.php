<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFloorRequest;
use App\Models\Floor;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $hall)
    {
        $hall_id = $hall;
        $floors = Floor::where('hall_id', $hall_id)->get();
        return view('web.admin.floor.index', compact('floors','hall_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $hall)
    {
        $hall_id = $hall;
        return view('web.admin.floor.create',compact('hall_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFloorRequest $request, string $hall_id)
    {
        $model = new Floor();
        $model->name = $request->name;
        $model->hall_id = $hall_id;
        $model->save();

        return redirect()
            ->route('admin.floors.index', ['hall' => $hall_id])
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
    public function edit(string $id, string $hall)
    {
        $hall_id = $hall;
        $floor = Floor::findOrFail($id);
        return view('web.admin.floor.edit', compact('floor', 'hall_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, string $hall)
    {
        $hall_id = $hall;
        $model = Floor::find($id);
        $model->name = $request->name;
        $model->hall_id = $hall_id;
        $model->save();

        return redirect()
        ->route('admin.floors.index', ['hall' => $hall_id])
        ->with([
            'message' => '階情報を変更しました',
            'status' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Floor $floor)
    {
        //
    }
}
