@extends('layouts.login')

@section('content')

{!! Form::open(['url' => 'profileup', 'enctype' => 'multipart/form-data']) !!}

<!-- バリデーションエラーメッセージ後で編集 -->
<!-- @error('email')
<span role="alert">
  <strong>{{ $message }}</strong>
</span>
@enderror -->

@csrf
<div class="user_profile">
  {{ Form::label('ユーザー名') }}
  <p>user name</p>
  {{ Form::text('username', Auth::user()->username, ['class' => 'input']) }}

  {{ Form::label('メールアドレス') }}
  <p>mail address</p>
  {{ Form::text('mail', Auth::user()->mail, ['class' => 'input']) }}

  {{ Form::label('新パスワード') }}
  <p>password</p>
  {{ Form::password('newpassword',['class' => 'input']) }}

  {{ Form::label('新パスワード確認用') }}
  <p>password confirm</p>
  {{ Form::password('newpassword_confirmation',['class' => 'input']) }}

  {{ Form::label('自己紹介文') }}
  <p>bio</p>
  {{ Form::text('bio', Auth::user()->bio, ['class' => 'input']) }}

  {{ Form::label('アイコン画像') }}
  <p>icon image</p>
  {{ Form::file('iconimage',['class' => 'input']) }}
</div>

<div class="button">
{{ Form::submit('更新',['class' =>'submit']) }}
</div>

{!! Form::close() !!}

@endsection
