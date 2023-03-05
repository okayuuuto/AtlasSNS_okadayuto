@extends('layouts.logout')

@section('content')

@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
@endif

{!! Form::open(['url' => 'register']) !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('ユーザー名') }}
<p>user name</p>{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('メールアドレス') }}
<p>mail address</p>{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('パスワード') }}
<p>password</p>{{ Form::text('password',null,['class' => 'input']) }}

{{ Form::label('パスワード確認') }}
<p>password confirm</p>{{ Form::text('password_confirmation',null,['class' => 'input']) }}

{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
