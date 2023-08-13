@extends('layouts.login')

@section('content')

<div class="profile_top">
  <img src="{{ asset('storage/images/' . $user->images) }}">
  <ul>
    <li class="profile_content">
    <p>name</p>
    <p>{{ $user->username }}</p>
    </li>
    <li class="profile_content">
    <p>bio</p>
    <p>{{ $user->bio }}</p>
    </li>
  </ul>

  <div class="follows_btn">
    @if (auth()->user()->isFollowing($user))
    <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="POST">
      @csrf
      @method('DELETE')

      <button type="submit" class="unfollow_btn">フォロー解除</button>
    </form>
  @else
    <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST">
      @csrf

      <button type="submit" class="follow_btn">フォローする</button>
    </form>
  @endif
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
