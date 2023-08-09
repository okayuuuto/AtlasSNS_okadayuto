@extends('layouts.login')

@section('content')

{!! Form::open(['url' => 'profileup', 'enctype' => 'multipart/form-data']) !!}

<!-- バリデーションエラーメッセージ -->
@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
@endif

@csrf
<div class="profile_container">
  <img class="icon" src="{{ asset('storage/images/' . Auth::user()->images) }}">
  <div class="form_update">
    <div class="profile_wrapper">
    {{ Form::label('ユーザー名') }}
    <p>user name</p>
    {{ Form::text('username', Auth::user()->username, ['class' => 'input']) }}
    </div>
    <div class="profile_wrapper">
    {{ Form::label('メールアドレス') }}
    <p>mail address</p>
    {{ Form::text('mail', Auth::user()->mail, ['class' => 'input']) }}
    </div>
    <div class="profile_wrapper">
    {{ Form::label('新パスワード') }}
    <p>password</p>
    {{ Form::password('newpassword',['class' => 'input']) }}
    </div>
    <div class="profile_wrapper">
    {{ Form::label('新パスワード確認用') }}
    <p>password confirm</p>
    {{ Form::password('newpassword_confirmation',['class' => 'input']) }}
    </div>
    <div class="profile_wrapper">
    {{ Form::label('自己紹介文') }}
    <p>bio</p>
    {{ Form::text('bio', Auth::user()->bio, ['class' => 'input']) }}
    </div>
    <div class="profile_wrapper">
    <p class="image_title">icon image</p>
    <label class="file_label">
    <p>ファイルを選択</p>
    {{ Form::file('iconimage',['class' => 'input']) }}
    </label>
    </div>
    <div class="profile_wrapper">
    {{ Form::submit('更新',['class' =>'submit']) }}
    </div>
  </div>
</div>

{!! Form::close() !!}

@endsection
