@extends('layouts.logout')

@section('content')

<div class="added_title">
  <p>{{ session('username') }}さん</p>
  <p>ようこそ！AtlasSNSへ</p>
</div>
<div class="added_content">
  <p>ユーザー登録が完了いたしました。</p>
  <p>早速ログインをしてみましょう！</p>
</div>
<div>
<button class="back_button"  onclick="location.href='/login'">ログイン画面へ
</button>
</div>

@endsection
