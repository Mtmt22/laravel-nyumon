@php
  \Carbon\Carbon::setLocale('ja');
@endphp

<html>
<body>
  <!-- タイトルを H1 タグで表示する -->
  <h1>{{ $diary->title }}</h1>
  <!-- 日記が3日前に作成されていたら表示する -->
  <!-- @if ($diary->created_at->gt(now()->subDays(3)))
    <span>🆕 新着！</span>
  @endif -->
  <!-- 内容と日付を表示する -->
  <div>
    <div>{{ $diary->body }}</div>
    <div>{{ $diary->date }}</div>
    <!-- <div>{{ \Carbon\Carbon::parse($diary->date)->isoFormat('YYYY年M月D日（ddd）') }}</div>
    <div>{{ \Carbon\Carbon::parse($diary->created_at)->isoFormat('YYYY年M月D日（ddd）HH時mm分') }}</div>
    <div>{{ \Carbon\Carbon::parse($diary->created_at)->isoFormat('YYYY年M月D日（ddd）A h時mm分') }}</div> -->

  </div>

  <!-- 編集画面へのリンク -->
  <div>
    <a href="{{ route('diary.edit', $diary) }}">
      <button>編集</button>
    </a>
   </div>

  <form method="post" action="{{ route('diary.destroy', $diary) }}">
    @csrf
    @method('delete')
    <button>削除</button>
  </form>

     <!-- メッセージの表示 -->
  @if (session('message'))
    <p style="color: green;">{{ session('message') }}</p>
  @endif
</body>
</html>
