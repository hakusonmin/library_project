<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFloorRequest;
use App\Http\Requests\UpdateHallRequest;
use App\Models\Floor;

class FloorController extends Controller
{
    protected $hall_id;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->hall_id = $request->route('hall');
            $request->merge(['hall_id' => $this->hall_id]);
            view()->share('hall_id', $this->hall_id);
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $floors = Floor::where('hall_id', $this->hall_id)->get();
        return view('web.admin.floor.index', compact('floors'));
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
    public function store(StoreFloorRequest $request)
    {
        $model = new Floor();
        $model->name = $request->name;
        $model->hall_id = $this->hall_id;
        $model->save();

        return redirect()
            ->route('admin.floors.index' ,['hall' => $this->hall_id])
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
    public function edit(string $id)
    {
        $floor = Floor::findOrFail($id);
        return view('web.admin.floor.edit', compact('floor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHallRequest $request, string $id)
    {
        $model = Floor::find($id);
        $model->name = $request->name;
        $model->hall_id = $this->hall_id;
        $model->save();

        return redirect()
            ->route('admin.floors.index')
            ->with([
                'message' => '階情報を変更しました',
                'status' => 'info'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Floor::findOrFail($id);
        $model->delete();
        return redirect()
            ->route('admin.floors.index')
            ->with('message', '階情報を削除しました');
    }
}
