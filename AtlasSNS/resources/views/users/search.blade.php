@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/search']) !!}

<div class="search_form">
  {!! Form::textarea('search', null, ['required', 'class' => 'search_form_control', 'placeholder' => 'ユーザー名', 'rows' => 1]) !!}

  <input type="image" name="submit" img class="search_icon" src="{{asset('images/search.png')}}" alt="送信">
  </input>
</div>

{!! Form::close() !!}

@endsection
