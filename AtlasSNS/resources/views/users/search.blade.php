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
<ul>
  <li></li>
  <li>{{ $user->username }}</li>
  <li></li>
</ul>
@endforeach

@endsection
