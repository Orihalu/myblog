<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;


class CommentsController extends Controller
{
    //
    public function store(Request $request, Post $post, User $user) {
      $this->validate($request, [
        'body' => 'required'
      ]);
      $comment = new Comment(['body' => $request->body]);
      //$request->user()でUserモデルからuser関数を呼び出してUserインスタンスのidプロパティをCommentインスタンスのuser_idとして保存する。
      $comment->user_id = $request->user()->id;
      // $user->name = $request->user()->name;
      $comment->user_name = $request->user()->name;
      $post->comments()->save($comment);
      return redirect()->action('PostsController@show', $post);
    }

    public function destroy(Post $post, Comment $comment) {
      $comment->delete();
      return redirect()->back();
    }


}