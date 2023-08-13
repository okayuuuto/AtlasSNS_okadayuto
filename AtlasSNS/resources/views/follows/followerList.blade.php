@extends('layouts.login')

@section('content')

<div class="list_top">
  <p>Follower List</p>
  <div class="icon_list">
    @foreach ($list as $follower)
    <a href="{{ route('followsProfile', ['id' => $follower->user->id]) }}">
    <img src="{{ asset('storage/images/' . $follower->user->images) }}">
    </a>
    @endforeach
  </div>
</div>

@foreach ($list as $list)
<div class="post_wrapper">
  <div class="post_content">
    <a href="{{ route('followsProfile', ['id' => $list->user->id]) }}">
    <img src="{{ asset('storage/images/' . $list->user->images) }}"></a>
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
