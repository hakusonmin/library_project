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
    public function index(string $hall_id)
    {
        $hall_id = $hall_id;
        $floors = Floor::where('hall_id', $hall_id)->get();
        return view('web.admin.floor.index', compact('floors','hall_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('web.admin.floor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFloorRequest $request,string $hall_id)
    {
        $model = new Floor();
        $model->name = $request->name;
        $model->hall_id = $hall_id;
        $model->save();

        return redirect()
            ->route('admin.floors.index')
            ->with([
                'message' => '階を登録しました',
                'status' => 'info'
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Floor $floor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Floor $floor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Floor $floor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Floor $floor)
    {
        //
    }
}
