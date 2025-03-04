<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegistrationRequest;
use App\Models\Registration;
use App\Models\Sheet;
use Auth;
use DB;
use Illuminate\Http\Request;
use Log;
use Throwable;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id();

        $registrations = Registration::where('user_id', $user_id)
            ->with('sheet.floor.hall')
            ->get();

        return view('web.user.registration.index', compact('registrations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $sheet_id = $request->query('sheet_id');
        $sheet = Sheet::with('floor.hall') //Sheetをとって期待のであっている
            ->findOrFail(($sheet_id));

        return view('web.user.registration.create', compact('sheet'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegistrationRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $sheet_id = $request->input(('sheet_id'));

                Registration::create([
                    'user_id' => Auth::id(),
                    'sheet_id' => $sheet_id
                ]);

                Sheet::where('id', $sheet_id)->update(['is_reserved' => 1]);
            });
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }

        return redirect()
            ->route('user.registrations.index')
            ->with([
                'message' => '座席を登録しました',
                'status' => 'info'
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Registration $registration)
    {
        $this->authorize('view', $registration);

        $registration = Registration::with('sheet.floor.hall')
            ->find($registration->id);

        return view('web.user.registration.show', compact('registration'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registration $registration)
    {
        $this->authorize('destroy', $registration);

        try {
            DB::transaction(function () use ($registration) {

                $registration = Registration::find($registration->id);
                $sheet_id = $registration->sheet_id;
                Sheet::where('id', $sheet_id)->update(['is_reserved' => 0]);
                //↓先に上の処理を行う(先にdelete行うと上記のfindのメソッドを使ってもそもそものデータをさっき消してしまったのでエラーが出る)
                Registration::where('id', $registration->id)
                    ->delete();
            });
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }

        return redirect()
            ->route('user.registrations.index')
            ->with([
                'message' => '座席を登録を解除しました',
                'status' => 'info'
            ]);
    }
}


