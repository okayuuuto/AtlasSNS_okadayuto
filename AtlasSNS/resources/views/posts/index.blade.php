@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/create']) !!}

<div class="post_form">
  <img src="images/icon1.png">
  {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form_control', 'placeholder' => '投稿内容を入力してください。']) !!}

  @if ($errors ->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <input type="image" name="submit" img class="post_btn" src="{{asset('images/post.png')}}" alt="送信">
  </input>
  </div>

{!! Form::close() !!}

<!-- <table class="table table-hover"> -->
@foreach ($list as $list)
<div class="post_list">
<ul>
  <li>{{ $list -> user -> username }}</li>
  <li>{{ $list -> post }}</li>
  <li>{{ $list -> created_at }}</li>
</ul>
</div>
@endforeach

@endsection
