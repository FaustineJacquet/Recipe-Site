@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 col-lg-8 create">
            <div class="card-title">
                <h1 class="newrecipe">New Recipe</h1>
            </div>

            <div class="card-body"> 
                <div class="bodybody">
                    <form action="{{route('post_store')}}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}
                        <label for="name">Name</label>
                        <input class="inputinfos" type="string" name="name">
                        <br>
                        <div class="input-group">
                            <label for="ingredients" class="label">Ingredients</label>
                            <textarea class="ingredientslabel label" type="string" name="ingredients"></textarea>
                        </div>
                        <br>
                        <label for="price">Estimated price for ingredients</label>
                        <input class="inputinfos" type="number" name="price">
                        <br>
                        <div class="input-group">
                            <label for="description" class="descriptionlabel">Description</label>
                            <textarea class="textarea" rows="3" cols="100" type="string" name="description"></textarea>
                        </div>
                        <br>
                        <label for="image">Add image</label>
                        <input class="inputinfos" type="file" name="image">
                        <br>
                        <button class="createrecipe" type="submit">Create recipe</button>       

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

