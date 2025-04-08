<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diary;

class ApiDiaryController extends Controller
{
  // apiコントローラーの処理
  public function index() {
    // すべてのデータを取得する
    $diaries = Diary::all();
    // json形式で返す
    return response()->json($diaries);

  }
}
