<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSheetRequest;
use App\Http\Requests\UpdateSheetRequest;
use App\Models\Sheet;

class SheetController extends Controller
{
    protected $floor_id;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->floor_id = $request->route('floor');
            $request->merge(['floor_id' => $this->floor_id]);
            view()->share('floor_id', $this->floor_id);
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sheets = Sheet::where('floor_id', $this->floor_id)->get();
        return view('web.admin.sheet.index', compact('sheets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('web.admin.sheet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSheetRequest $request)
    {
        $model = new Sheet();
        $model->name = $request->name;
        $model->floor_id = $this->floor_id;
        $model->save();

        return redirect()
            ->route('admin.sheets.index', ['floor' => $this->floor_id])
            ->with([
                'message' => '座席情報を登録しました',
                'status' => 'info'
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sheet $sheet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sheet = Sheet::findOrFail($id);
        return view('web.admin.sheet.edit', compact('sheet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSheetRequest $request, string $id)
    {
        $model = Sheet::find($id);
        $model->name = $request->name;
        $model->floor_id = $this->floor_id;
        $model->save();

        return redirect()
            ->route('admin.sheets.index', ['floor' => $this->floor_id])
            ->with([
                'message' => '席情報を変更しました',
                'status' => 'info'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Sheet::findOrFail($id);
        $model->delete();
        return redirect()
            ->route('admin.sheets.index', ['floor' => $this->floor_id])
            ->with('message', '席情報を削除しました');
    }
}
