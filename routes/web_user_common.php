<?php

use App\Http\Controllers\User\FloorController;
use App\Http\Controllers\User\HallController;
use App\Http\Controllers\User\RegistrationController;
use App\Http\Controllers\User\SheetController;

Route::prefix('user')
    ->middleware('auth:user')
    ->name('user.')
    ->group(function () {
        Route::resource('floors', FloorController::class);
        Route::resource('halls', HallController::class);
        Route::resource('sheets', SheetController::class);
        Route::resource('registrations', RegistrationController::class);
    });
