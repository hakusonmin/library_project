<?php

use App\Http\Controllers\Admin\FloorController;
use App\Http\Controllers\Admin\HallController;
use App\Http\Controllers\Admin\RegistrationController;
use App\Http\Controllers\Admin\SheetController;
use App\Http\Controllers\Admin\UserController;

Route::prefix('admin')
    ->middleware('auth:admin')
    ->name('admin.')
    ->group(function () {

        //管理者ダッシュボードへのルーティング
        Route::get('/', function () {
            return view('web.admin.index');
        })->name('index');

        Route::resource('halls', HallController::class);

        Route::prefix('halls/{hall}')->group(function () {
            Route::resource('floors', FloorController::class);
        });

        Route::prefix('floors/{floor}')->group(function () {
            Route::resource('sheets', SheetController::class);
        });

        Route::prefix('sheets/{sheet}')->group(function () {
            Route::resource('registrations', RegistrationController::class);
        });


        Route::resource('users', UserController::class);
    });
