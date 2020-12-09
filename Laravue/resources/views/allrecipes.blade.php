@extends('layouts.app')

@section('content')

<div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
           <div class="textrecipe">Recipes</div>
         </div>

         <div>

           <div class="container-fluid" style="margin-top: 2vh; margin-bottom: 3vh;">
            <div class="row">
              @foreach ($posts as $post)
              <div class="col-sm-6 col-lg-4" style="margin-top: 3vh;">

                <div class="card" style="border: solid 3px; border-color: #f9c4ff;">

                  <img src="/storage/{{$post->image}}" class="card-img-top" alt="...">

                  <div class="card-body">
                    <h5 class="card-title"> {{$post->name}}</h5>
                    <p class="card-text"> Estimate price : {{$post->price}} $</p>
                    <a class="show" href="{{route('post_show', ['id'=>$post->id])}}" variant="light" onmouseover="this.style.background='#f9c4ff'" onmouseout="this.style.background='white'"> Show details about this recipe </a>
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

@endsection
