@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/create']) !!}

<div class="post_form">
  <img src="images/icon1.png">
  {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form_control', 'placeholder' => '投稿内容を入力してください。']) !!}
  <input type="image" name="submit" img class="post_btn" src="{{asset('images/post.png')}}" alt="送信">
  </input>
  </div>

{!! Form::close() !!}

@endsection
