<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diary;
use Illuminate\Auth\Events\Validated;

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

  public function save(Request $request) {
    // <input name="title'...> で指定された内容を取得する
    $title = $request->input('title');
    $body = $request->input('body');

    // 入力内容を検証（バリデーション）する → 空だった場合にエラー
    $validated = $request->validate([
      // title は入力必須、かつ 20文字以内
      'title' => 'required|max:20',
      // body は入力必須
      'body' => 'required',
    ]);
    // 精査済みのデータを利用する
    $title = $validated['title'];
    $body = $validated['body'];

    // 新しい Diary モデルインスタンスを作成
    $diary = new Diary();
    // 現在の日付、title と body をセット
    $diary->date = date("Y-m-d");
    $diary->title = $title;
    $diary->body = $body;

    // データベースに保存
    $diary->save();

    // 保存後にリダイレクトする（例：日記入力ページへ）
    // return back()->with('message', '保存しました');
    // 日記一覧にリダイレクトする
    return redirect()->route('diary.index')->with('message', '保存しました');
  }


  // データのIDを取得
  public function show($id) {
    // 指定されたIDを持つ情報をデータベースから検索する
    $diary = Diary::find($id);
    // 存在しない記事だった場合に404を返す
    $diary = Diary::findOrFail($id);
    // そのIDの情報を表示する
    // 作成画面に戻る
    return view('diary.show', compact('diary'));
  }


  // 編集画面表示のための処理
  public function edit($id) {
    // 指定されたIDを持つ情報をデータベースから検索する
    $diary = Diary::find($id);
    // そのIDの情報をビューに渡す
    return view('diary.edit', compact('diary'));
  }


  // 更新処理（対象をデータベースから取得し、それを更新する）
  public function update(Request $request, $id) {
    // 更新対象となるデータを取得する
    $diary = Diary::find($id);

    // リクエストデータを精査する(入力値チェックを行う)
    // タイトルは20文字以内、本文は400文字以内という制限を設ける
    $validated = $request->validate([
      'title' => 'required|max:20',
      'body' => 'required|max:400',
    ]);


    // チェック済みの値を使用して更新処理を行う
    $diary->update($validated);

    // 更新後、日記詳細ページにリダイレクトし、成功メッセージを表示
    // return back()->with('message', '更新しました');//編集画面に戻ってしまう
    return redirect()->route('diary.index', $id)->with('message', '更新しました');
  }


  // 削除処理
  public function destroy(Request $request) {
    // IDを受け取る（引数で受け取る他に、下記の書き方でも出来る）
    $id = $request->route('id');

    // 削除対象となるデータを取得する
    $diary = Diary::find($id);

    // 削除する
    $diary->delete();

    // 記事一覧画面に戻る
    return redirect()->route('diary.index')->with('message', '削除しました');


  }


}
