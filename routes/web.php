<?php

use App\Http\Controllers\DiaryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/station5', function(){
  return 'station5';
});

// Route::HTTPメソッド名('URL', [コントローラ名::class, 'メソッド名'])->name('ルート名');

Route::get('/diary', [DiaryController::class, 'index'])->name('diary.index');
// Route::get('/hello', [DiaryController::class, 'index'])->name('diary.index');

// データ作成
Route::get('/diary/create', [DiaryController::class, 'create'])->name('diary.create');
Route::post('/diary', [DiaryController::class, 'store'])->name('diary.index');
