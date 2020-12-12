@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">

    <div class="col-md-7">
      <div class="card color">

        <div class="card-header color"><h2 class="profilename">{{ $user->name }}'s Profile</h2></div>

        <div>

          <div class="card card-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header text-white">

              <div class="card-body color picture">
                <div class="bodybody">

                  <img class="avatar" src="/uploads/avatars/{{ $user->avatar }}">
                </div>
              </div>

            </div>

          </div>

        </div>
      </div>
    </div>
    <div class="col-md-5" style="margin-top: 4vh;">
     <div class="card">
      <div class="card-body color">
       <div class="tab-content">
        <h3 class="personal">Personal informations :</h3>
        <h5>{{ __('Name :') }} {{ Auth::user()->name }}</h5>
        <h5>{{ __('Email :') }}  {{ Auth::user()->email }}</h5>
      </div>
    </div>
  </div>

  <div class="card" style="margin-top: 2rem;">
    <div class="card-body color">
     <div class="tab-content">

      <div class="form-group">
       <form enctype="multipart/form-data" action="/profile" method="POST">
         <h3 class="updateimage">Update profile image :</h3>
         <input type="file" name="avatar">
         <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
         <input class="yes" type="submit" value="Save image" onmouseover="this.style.background='#f9c4ff'" onmouseout="this.style.background='white'">
       </form>

     </div>
   </div>
 </div>
</div>
</div>



<br>

@if(!Auth::user()->posts->isEmpty() )
<h1 class="myrecipes">My recipes</h1>

<div class="container">
  <div class="row">
    @foreach (Auth::user()->posts as $post)
    <div class="col-sm-6 col-lg-4" style="margin-top: 3vh;">
      <div class="card color">

        <div class="iconcenter">
          <a href="{{route('post_edit', ['id'=>$post->id])}}"><i class="far fa-edit" onmouseover="this.style.background='#f9c4ff'" onmouseout="this.style.background='white'"> Edit Recipe</i></a>
          <form action="{{route('post_destroy', ['id'=>$post->id])}}" method="POST">
            {{ csrf_field() }}  
            <button type="submit" class="delete" onmouseover="this.style.background='#f9c4ff'" onmouseout="this.style.background='white'"><i class="far fa-trash-alt"> Delete Recipe</i></button>
          </form>
        </div>

        <img class="imagestore" src="/storage/{{$post->image}}" class="card-img-top" alt="...">
        <h1 class="titleincard card-title"> {{$post->name}}</h1>
        <p class="textincard card-text"> {{$post->price}} $</p>
        <a href="{{route('post_show', ['id'=>$post->id])}}" variant="light" class="showrecipe" onmouseover="this.style.background='#f9c4ff'" onmouseout="this.style.background='white'"> Show details about this recipe </a>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endif


@endsection

