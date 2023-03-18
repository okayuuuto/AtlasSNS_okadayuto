@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<p>AtlasSNSへようこそ</p>

@csrf
<!-- {{ Form::label('mail address') }} -->
<div class="form">
<p>mail address</p>
{{ Form::text('mail',null,['class' => 'input']) }}
<!-- {{ Form::label('password') }} -->
<p>password</p>
{{ Form::password('password',['class' => 'input']) }}
</div>
<div class="button">
{{ Form::submit('LOGIN',['class' => 'submit']) }}
</div>
<div class="register">
<p><a href="/register">新規ユーザーの方はこちら</a></p>
</div>

{!! Form::close() !!}

@endsection
