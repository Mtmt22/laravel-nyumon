<!-- ビューファイル -->
<html>
<body>
<!-- 変数 $name の値を表示する -->
{{-- Hello, {{ $name }}! --}}
{{-- <?php echo 'Hello, ' . $name . '!'; ?> --}}
<!-- <?php echo 'Hello!'; ?> -->

<!-- リスト（配列）になっているデータを1つずつ取り出して処理する -->
 <!-- $diaries というリスト（配列のようなもの）から、1件ずつ取り出して、
  それを $diary という変数の名前で使えるようにする。
  $diary じゃなくても良いが対応していないとだめ-->
@foreach($diaries as $diary)
<div>
  <div>{{ $diary->date }}</div>
  <div>
    <a href="{{ route('diary.show', $diary) }}">{{ $diary->title }}</a>
  </div>
  <!-- <div>{{ $diary->title }}</div> -->
</div>
@endforeach
<!-- メッセージの表示 -->
@if (session('message'))
  <p style="color: green;">{{ session('message') }}</p>
@endif

</body>
</html>
