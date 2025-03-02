<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSheetRequest;
use App\Http\Requests\UpdateSheetRequest;
use App\Models\Floor;
use App\Models\Sheet;

class SheetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Floor $floor, Sheet $sheet)
    {
        $sheets = Sheet::where('floor_id', $floor->id)->get();
        return view('web.admin.sheet.index', compact('sheets', 'floor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Floor $floor)
    {
        return view('web.admin.sheet.create', compact('floor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSheetRequest $request, Floor $floor)
    {
        $model = new Sheet();
        $model->name = $request->name;
        $model->floor_id = $floor->id;
        $model->save();

        return redirect()
            ->route('admin.sheets.index', ['floor' => $floor->id])
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
    public function edit(Floor $floor, Sheet $sheet)
    {
        return view('web.admin.sheet.edit', compact('sheet', 'floor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSheetRequest $request, Floor $floor, Sheet $sheet)
    {
        $model = $sheet;
        $model->name = $request->name;
        $model->floor_id = $floor->id;
        $model->save();

        return redirect()
            ->route('admin.sheets.index', ['floor' => $floor->id])
            ->with([
                'message' => '席情報を変更しました',
                'status' => 'info'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Floor $floor, Sheet $sheet)
    {
        $model = $sheet;
        $model->delete();
        return redirect()
            ->route('admin.sheets.index', ['floor' => $floor->id])
            ->with('message', '席情報を削除しました');
    }
}
