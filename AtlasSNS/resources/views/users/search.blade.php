@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/search', 'method' => 'GET']) !!}

<div class="search_form">
  {!! Form::text('search', null, ['class' => 'search_form_control', 'placeholder' => 'ユーザー名']) !!}

  <input type="image" name="submit" img class="search_icon" src="{{asset('images/search.png')}}" alt="送信">
  </input>
  <p>検索ワード： {{ $keyword }}</p>
</div>

{!! Form::close() !!}

@foreach ($users as $user)
<div class="user_list">
  <p>{{ $user->username }}</p>

  @if (auth()->user()->isFollowing($user))
    <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="POST">
      @csrf
      @method('DELETE')

      <button type="submit" class="unfollow_btn"><a>フォロー解除</a></button>
    </form>
    <!-- <form action="/users/{{ $user->id }}/follow" method="POST">
      @csrf
      {{ method_field('DELETE') }}

      <button type="submit" class="unfollow_btn"><a>フォロー解除</a></button>
    </form> -->
  @else
    <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST">
      @csrf

      <button type="submit" class="follow_btn"><a>フォローする</a></button>
    </form>
    <!-- <form action="/users/{{ $user->id }}/unfollow" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit" class="follow_btn"><a>フォローする</a></button>
    </form> -->
  @endif
</div>
@endforeach

@endsection
