@extends('layouts.app')

@section('content')

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

</head>
<body>

  <div>

    @if (Route::has('login'))
    @auth
    <div class="welcomepage"><h1 class="helloname">{{ __('Hello') }} {{ Auth::user()->name }} </h1></div>

    <div class="container">
      <div class="row justify-content-center">

        <img class="imagewelcome" src="/images/poele.jpg">
        <img class="imagewelcome" src="/images/cakerond.jpg">
        <img class="imagewelcome" src="/images/pates.jpg">

      </div>
    </div>

    <p class="login">{{ __('You are now logged in !') }}</p>
    <p class="email">{{ __('with this email ->  ') }}{{ Auth::user()->email }}<p>

      @else
      <p class="youhaveto">You have to login or register <br> If you want to see recipes</p>

      <div class="container">
        <div class="row justify-content-center">

          <img class="imagewelcome" src="/images/poele.jpg">
          <img class="imagewelcome" src="/images/cakerond.jpg">
          <img class="imagewelcome" src="/images/pates.jpg">

        </div>
      </div>
      @endif
      @endauth

    </div>

  </div>
</body>
</html>

@endsection
