<?php

use App\Http\Controllers\User\FloorController;
use App\Http\Controllers\User\HallController;
use App\Http\Controllers\User\RegistrationController;
use App\Http\Controllers\User\SheetController;

Route::prefix('user')
    ->middleware('auth')//userはデフォルトなので auth:userとしてはいけない
    ->name('user.')
    ->group(function () {

        //ユーザーダッシュボードへのルーティング
        Route::get('/', function () {
            return view('web.user.index');
        })->name('index');

        //ここでfloorを呼べばネストするひつようなんてない
        Route::resource('halls', HallController::class);

        //ここでSheetを呼べばネストする必要がない
        Route::prefix('halls/{hall}')->scopeBindings()->group(function () {
            Route::resource('floors', FloorController::class);
        });

        Route::prefix('floors/{floor}')->scopeBindings()->group(function () {
            Route::resource('sheets', SheetController::class);
        });

        Route::resource('registrations', RegistrationController::class);
    });
