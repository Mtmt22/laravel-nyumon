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
Route::post('/diary', [DiaryController::class, 'save'])->name('diary.save');

// 個別データの取得
Route::get('/diary/{id}', [DiaryController::class, 'show'])->name('diary.show');

//編集機能の作成
// 編集画面を表示
Route::get('/diary/{id}/edit', [DiaryController::class, 'edit'])->name('diary.edit');
// 更新を実行
Route::patch('/diary/{id}', [DiaryController::class, 'update'])->name('diary.update');

// 削除を実行
Route::delete('/diary/{id}', [DiaryController::class, 'destroy'])->name('diary.destroy');
