<?php

//use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('web.user.index');
})->name('index');

//この二つが超大事
Route::prefix('user')->name('user.')->group(function () {
  require __DIR__ . '/web_user.php';
});

Route::prefix('admin')->name('admin.')->group(function () {
  require __DIR__ . '/web_admin.php';
});

require __DIR__ . '/web_admin_common.php';

require __DIR__ . '/web_user_common.php';

// Route::get('/', function () {
//     return view('welcome');
// });
