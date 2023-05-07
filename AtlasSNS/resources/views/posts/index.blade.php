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
  <div class="post_date">{{ $list -> created_at->format('Y-m-d H:i') }}
  </div>
</div>
<div class="edit_btn">
  <a class="js-modal-open" href="" post="{{ $list->post }}" post_id="{{ $list->id }}"><img class="edit" src="images/edit.png"></a>
  <img class="delete_btn" src="images/trash.png">
</div>

<!-- モーダルの中身 -->
<div class="modal js-modal">
  <div class="modal__bg js-modal-close"></div>
  <div class="modal__content">
    <form action="/update" method="post">
      <textarea name="upPost" class="modal_post"></textarea>
      <input type="hidden" name="id" class="modal_id" value="">
      <input type="submit" value="更新">
      {{ csrf_field() }}
    </form>
    <a class="js-modal-close" href="">閉じる</a>
  </div>
</div>

@endforeach

@endsection
