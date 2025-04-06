<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diary;

class DiaryController extends Controller
{
  public function index() {
    $name = 'Laravel';
    // Diary はモデル名でデータベース操作をしてくれている
    $diaries = Diary::all();
    return view('diary.index', compact('diaries'));
    // return view('diary.index', compact('name'));
    // return view('diary.index', ['name' => 'Matsumoto']);
    // return 'Hello, Controller!';
  }

  public function create() {
    return view('diary.create');
  }

  public function store() {
    return view('diary.index');
  }
}
