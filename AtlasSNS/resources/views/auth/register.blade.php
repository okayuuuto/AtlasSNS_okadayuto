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

<div class="form">
<p>user name</p>{{ Form::text('username',null,['class' => 'input']) }}

<p>mail address</p>{{ Form::text('mail',null,['class' => 'input']) }}

<p>password</p>{{ Form::password('password',['class' => 'input']) }}

<p>password confirm</p>{{ Form::password('password_confirmation',['class' => 'input']) }}
</div>

<div class="button">
{{ Form::submit('REGISTER',['class' =>'submit']) }}
</div>

<div class="register">
<p><a href="/login">ログイン画面へ戻る</a></p>
</div>

{!! Form::close() !!}


@endsection
