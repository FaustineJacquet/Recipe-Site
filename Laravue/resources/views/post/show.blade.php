@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-sm-8 col-lg-8" >
			<div class="card" style="border: solid 2px; border-color: #f9c4ff; margin-bottom: 5vh;">
				<div class="color2">
					<h1 class="card-title center">{{ $post->name }} </h1>
				</div>
				<img class=".card-img-top-show" src="/storage/{{ $post->image }}">
				<div class="color2">
					<h4 class="price"> Estimate price : {{$post->price}} $ </h4>
					<h4 class="ingredients"> Ingredients : </h4> <p class="recipeingredients">{{$post->ingredients}}</p>
					<h4 class="steps"> Steps : </h4><p class="recipesteps">{{$post->description}}</p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<br>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-sm-10 col-lg-10" >
			<div class="card" style="border: solid 2px; border-color: #f9c4ff; margin-bottom: 5vh; padding: 3vh;">
				<h3 class="comments">Comments</h3>
				@forelse ($post->comments as $comment)
				@isset($comment_id)
				<?php if ($comment->user->name == Auth::user()->name) {  ?> 
					<form method="POST" action="{{ route('comments_update', ['id'=>$comment->id]   ) }}">
						@csrf
						<div class="form-group">
							<textarea class="form-control" name="body">{{$comment->body}}</textarea>
							<input type="hidden" name="post_id" value="{{ $post->id }}" />
						</div>
						<div class="form-group">
							<input type="submit" class="editinput" onmouseover="this.style.background='#f9c4ff'" onmouseout="this.style.background='white'" value="Edit Comment" />
						</div>
					</form>
				<?php } ?>

				@else
				<p class="usercom">{{ $comment->user->name }} {{ $comment->created_at }}</p>
				<p class="body">{{ $comment->body }}</p>
				@endisset

				<?php if ($comment->user->name == Auth::user()->name) {  ?> 
					<form action="{{ route('post_show', ['id'=>$post->id]) }}" method="GET">
						{{csrf_field()}} <input type="hidden" name="comment_id" value="{{ $comment->id }}">
						<button type="submit" class="editcomment" onmouseover="this.style.background='#f9c4ff'" onmouseout="this.style.background='white'"><i class="fas fa-pen-square"> Edit Comment</i></button>
					</form>
					<br>
					<form action="{{ route('comments_destroy', ['id'=>$comment->id]) }}" method="POST">
						{{csrf_field()}}
						<button type="submit" class="deletecomment" onmouseover="this.style.background='#f9c4ff'" onmouseout="this.style.background='white'"><i class="fas fa-minus-square"> Delete Comment</i></button>
					</form>
				<?php } ?>

				@empty
				<p class="nocomments">This post has no comments</p>
				@endforelse
				@isset($comment_id)
				@else
				<form method="post" action="{{ route('comments_store') }}">
					@csrf
					<div class="form-group" style="margin-top: 5vh;">
						<textarea class="form-control" name="body"></textarea>
						<input type="hidden" name="post_id" value="{{ $post->id }}" />
					</div>
					<div class="form-group">
						<input class="buttoncomment" type="submit" name="btn btn-success" value="Add Comment" />				
					</div>
				</form>
				@endisset
			</div>
		</div>
	</div>


	@endsection
