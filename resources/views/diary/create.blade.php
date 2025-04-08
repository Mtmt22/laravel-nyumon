<html>
<body>
  <form method="post" action="{{ route('diary.save') }}">
    @csrf
    <div>
      <label for="title">タイトル：</label>
      <input type="text" id="title" name="title">
    </div>
    <div>
      <label for="body">本文：</label>
      <textarea id="body" name="body" rows="4" cols="40"></textarea>
    </div>
    <div>
      <button type="submit">保存</button>
    </div>
  </form>
  <!-- メッセージの表示 -->
  @if (session('message'))
    <p style="color: green;">{{ session('message') }}</p>
  @endif
</body>
</html>
