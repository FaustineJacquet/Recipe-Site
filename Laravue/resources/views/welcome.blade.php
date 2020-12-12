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
    <div>

      <div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="card" style="border: solid 3px; border-color: #f9c4ff;">
                <div class="card-header" style="background-color: #f9c4ff;">

                 <h1 class="titlewelcome">Recipes</h1>              
               </div>

               <div>

                 <div class="container-fluid" style="margin-top: 2vh; margin-bottom: 3vh;">
                  <div class="row">
                    @foreach ($posts as $post)
                    <div class="col-sm-6 col-lg-4" style="margin-top: 3vh;">

                      <div class="card" style="border: solid 3px; border-color: #f9c4ff;">

                        <img src="/storage/{{$post->image}}" class="card-img-top" alt="...">

                        <div class="card-body">
                          <h5 class="namecard card-title"> {{$post->name}}</h5>
                          <p class="card-text"> Estimate price : {{$post->price}} $</p>
                          <a class="showrecipe" href="{{route('post_show', ['id'=>$post->id])}}" variant="light" onmouseover="this.style.background='#f9c4ff'" onmouseout="this.style.background='white'"> Show details about this recipe </a>

                        </div>

                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    @else
    <p class="youhaveto">You have to login or register <br> If you want to create recipes or comments</p>
    <p class="seerecipes">You can also see recipes at the bottom of the page</p>

    <div class="container">
      <div class="row justify-content-center">

        <img class="imagewelcome" src="/images/poele.jpg">
        <img class="imagewelcome" src="/images/cakerond.jpg">
        <img class="imagewelcome" src="/images/pates.jpg">

      </div>
    </div>

    <div class="container" style="margin-top: 20vh;">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card" style="border: solid 3px; border-color: #f9c4ff;">
            <div class="card-header" style="background-color: #f9c4ff;">

             <h1 class="textrecipe">Recipes</h1>              
           </div>

           <div>

             <div class="container-fluid" style="margin-top: 2vh; margin-bottom: 3vh;">
              <div class="row">
                @foreach ($posts as $post)
                <div class="col-sm-6 col-lg-4" style="margin-top: 3vh;">

                  <div class="card" style="border: solid 3px; border-color: #f9c4ff;">

                    <img src="/storage/{{$post->image}}" class="card-img-top" alt="...">

                    <div class="card-body">
                      <div class="bodybody">
                        <h5 class="card-title"> {{$post->name}}</h5>
                        <p class="card-text"> Estimate price : {{$post->price}} $</p>
                        <a class="showrecipe" href="{{route('post_show', ['id'=>$post->id])}}" variant="light" onmouseover="this.style.background='#f9c4ff'" onmouseout="this.style.background='white'"> Show details about this recipe </a>
                      </div>

                    </div>

                  </div>
                </div>
                @endforeach
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    @endif
    @endauth

  </div>

</div>
</body>
</html>

@endsection
