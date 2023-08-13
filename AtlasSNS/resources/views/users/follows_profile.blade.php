@extends('layouts.login')

@section('content')

<div class="list_top">
  <img src="{{ asset('storage/images/' . $user->images) }}">
  <p>name</p>
  <p>bio</p>
  <div class="icon_list">

  </div>
</div>

@foreach ($post as $list)
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
</div>
@endforeach

@endsection
