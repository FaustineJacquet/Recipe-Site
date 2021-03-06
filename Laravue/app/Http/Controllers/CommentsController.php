<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
        $comment= new Comment();
        $comment->body = $request->body;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->post_id;
        $comment->save();
        return redirect()->route('post_show', ['id'=>$comment->post_id]);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $comment)
    {
        $comment=Comment::find($comment);
        $comment->body = $request->body;
        $comment->id = $request->id;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->post_id;
        $comment->save();
        return redirect()->route('post_show', ['id'=>$comment->post_id]);    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($comment)
    {
     $comment=Comment::find($comment);
     $post=$comment->post;
     $comment->delete();
     return redirect()->route('post_show', ['id'=>$post]);
 }
}