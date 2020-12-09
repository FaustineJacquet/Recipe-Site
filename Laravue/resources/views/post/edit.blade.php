@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 col-lg-8 create">
            <div class="card-title">
                <h1 class="newrecipe">Edit recipe</h1>
            </div>

            <div class="card-body"> 

                <form action="{{route('post_update', ['id'=>$post->id])}}" enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}
                    <label for="name">Name</label>
                    <input type="string" name="name" class="inputinfos" value="{{ $post->name }}">
                    <br>
                    <div class="input-group">
                        <label for="ingredients" class="editingredients">Ingredients</label>
                        <textarea class="ingredientslabel" type="string" name="ingredients"><?php echo htmlspecialchars($post->ingredients); ?></textarea>
                    </div>
                    <br>
                    <label for="price">Estimated price for ingredients</label>
                    <input type="number" name="price" class="inputinfos" value="{{ $post->price }}">
                    <br>
                    <div class="input-group">
                        <label for="description" class="editdescription">Description</label>
                        <textarea class="textarea" rows="3" cols="100" type="string" name="description"><?php echo htmlspecialchars($post->description); ?></textarea>
                    </div>
                    <br>
                    <label for="image" class="changeimage"><i class="fas fa-exclamation-triangle"></i>You have to change your image</label>
                    <input class="inputinfos" type="file" name="image">
                    <br>
                    <button type="submit" class="createrecipe">Edit recipe</button>

                    <a class="profile" href="{{ route('profile') }}" onmouseover="this.style.background='#f9c4ff'" onmouseout="this.style.background='white'"><i class="fa fa-btn fa-user" style="padding-right: 1vw; color: black; font-size: 2vh;"></i>{{ __('Back to profile') }}</a>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

