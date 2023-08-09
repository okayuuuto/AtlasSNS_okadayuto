@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/create']) !!}
@if ($errors ->any())
  <div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
  </div>
@endif

<div class="post_form">
  <img src="{{ asset('storage/images/' . Auth::user()->images) }}">
  {!! Form::textarea('newPost', null, ['required', 'class' => 'form_control', 'placeholder' => '投稿内容を入力してください。', 'rows' => 4]) !!}

  <input type="image" name="submit" img class="post_btn" src="{{asset('images/post.png')}}" alt="送信">
  </input>
  </div>

{!! Form::close() !!}

@foreach ($list as $list)
<div class="post_wrapper">
<div class="post_content">
  <img src="{{ asset('storage/images/' . $list->user->images) }}">
  <ul>
    <li>{{ $list -> user -> username }}</li>
    <li class="post_text">{!! nl2br(e($list->post)) !!}</li>
  </ul>
  <div class="post_date">{{ $list -> created_at->format('Y-m-d H:i') }}
  </div>
</div>
@if (Auth::user()->id === $list->user_id)
<div class="edit_btn">
  <a class="js-modal-open" href="" post="{{ $list->post }}" post_id="{{ $list->id }}"><img class="edit" src="images/edit.png"></a>

  <a class="delete-modal-open" href="/post/{{$list->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')"><img class="delete_btn" src="images/trash.png" onmouseover="this.src='images/trash-h.png'" onmouseout="this.src='images/trash.png'"></a>
</div>
@endif
</div>

<!-- モーダルの中身 -->
<div class="modal js-modal">
  <div class="modal__bg js-modal-close"></div>
  <div class="modal__content">
    <form action="/update" method="post">
      <textarea name="upPost" class="modal_post" maxlength="200"></textarea>
      <input type="hidden" name="id" class="modal_id" value="">
      <input type="image" width="40" height="40" src="images/edit.png" alt="">
      {{ csrf_field() }}
    </form>
  </div>
</div>

@endforeach

@endsection
