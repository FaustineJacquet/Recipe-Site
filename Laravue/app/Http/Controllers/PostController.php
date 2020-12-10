<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$posts = Post::all();
    	return view('welcome', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('post/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$post= new Post([
    		'name' => $request->get('name'),
    		'ingredients' => $request->get('ingredients'),
    		'price' => $request->get('price'),
    		'description' => $request->get('description'),
    		'user_id' => Auth::user()->id,
    		'image' => $request->image->store("/posts", 'public'),
    	]);
    	$post->save();
    	return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $post)
    {
      $post=Post::find($post);
      return view('post/show', ['post'=>$post, 'comment_id'=>$request->get('comment_id')]);
  }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($post)
    {
    	$post=Post::find($post);
        return view('post/edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post)
    {
    	$post=Post::find($post);
        $post->name = $request->name;
        $post->ingredients = $request->ingredients;
        $post->price = $request->price;
        $post->description = $request->description;
        $post->image = $request->image->store("/posts", 'public');
        $post->user_id = Auth::user()->id;
        $post->save();
        return redirect()->route('profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {
    	$post=Post::find($post);
    	$post->user_id = Auth::user()->id;
    	$post->delete();
    	return redirect()->route('profile');
    }

    public function search()
    {
        $search_text = $_GET['query'];
        $posts = Post::where('ingredients', 'LIKE', '%'.$search_text.'%')->get();

        return view('post/search', ['posts' => $posts]);
    }
}
