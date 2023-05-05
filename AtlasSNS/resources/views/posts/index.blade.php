@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/create']) !!}

<div class="post_form">
  <img src="images/icon1.png">
  {!! Form::textarea('newPost', null, ['required', 'class' => 'form_control', 'placeholder' => '投稿内容を入力してください。', 'rows' => 4]) !!}

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

@foreach ($list as $list)
<div class="post_content">
  <img src="images/icon1.png">
<ul>
  <li>{{ $list -> user -> username }}</li>
  <li class="post_text">{!! nl2br(e($list->post)) !!}</li>
</ul>
<div class="post_date">{{ $list -> created_at->format('Y-m-d H:i') }}</div>
</div>
@endforeach

@endsection
