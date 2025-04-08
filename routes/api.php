<?php

use App\Http\Controllers\ApiDiaryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// ApiDiaryController.phpのルート定義
// Route::get('/api/diary', 'ApiDiaryController@index');
Route::get('/diary', [ApiDiaryController::class, 'index']);
