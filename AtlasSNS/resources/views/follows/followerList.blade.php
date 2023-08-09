@extends('layouts.login')

@section('content')

<div class="list_top">
  <p>Follower List</p>
  <div class="icon_list">
    <!-- フォローしているユーザーを取得し、アイコンのみをループで表示させる。また、アイコンをそれぞれのユーザーのプロフィールに飛ぶようリンクにする。 -->
  </div>
</div>

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
</div>
@endforeach

@endsection
