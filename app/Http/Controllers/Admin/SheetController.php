<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSheetRequest;
use App\Http\Requests\UpdateSheetRequest;
use App\Models\Sheet;
use Illuminate\Http\Request;

class SheetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $floor)
    {
        $floor_id = $floor;
        $sheets = Sheet::where('floor_id', $floor_id)->get();
        return view('web.admin.sheet.index', compact('sheets', 'floor_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $floor)
    {
        $floor_id = $floor;
        return view('web.admin.sheet.create', compact('floor_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSheetRequest $request, string $floor_id)
    {
        $model = new Sheet();
        $model->name = $request->name;
        $model->floor_id = $floor_id;
        $model->save();

        return redirect()
            ->route('admin.sheets.index', ['floor' => $floor_id])
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
    public function edit(string $id, string $floor)
    {
        $floor_id = $floor;
        $sheet = Sheet::findOrFail($id);
        return view('web.admin.sheet.edit', compact('sheet', 'floor_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSheetRequest $request, string $id, string $floor)
    {
        $floor_id = $floor;
        $model = Sheet::find($id);
        $model->name = $request->name;
        $model->floor_id = $floor_id;
        $model->save();

        return redirect()
            ->route('admin.sheets.index', ['floor' => $floor_id])
            ->with([
                'message' => '席情報を変更しました',
                'status' => 'info'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sheet $sheet)
    {
        //
    }
}
