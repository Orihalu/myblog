<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Comment;
use Gate;





class PostsController extends Controller
{
    public function index(){
      //$posts = \App\Post::all();
      //$posts = Post::all();
      //$posts = Post::orderBy('created_at','desc')->get();
      //$posts = Post::all();
      $posts = Post::latest()->get();

      if (Auth::check()) {
      //dd($posts->toArray()); //dump die
      //return view('posts.index', ['posts' => $posts]);
      return view('posts.index')->with('posts', $posts);
    }
      else {
        return redirect('/login');
      }
    }
    //public function show($id) {
    public function show(Post $post,User $user) {
      // $post = Post::findOrFail($id);
      return view('posts.show')->with([
        'post' => $post,
        'user' => $user,
      ]);
    }

    public function create() {
      return view('posts.create');
    }

    public function store(PostRequest $request) {

      $post = new Post();
      $post->title = $request->title;
      $post->body = $request->body;
      $post->user_id = $request->user_id;
      $post->save();
      return redirect ('/');
    }

      public function edit(Post $post) {
      //$post = Post::findOrFail($id);
      //update destroyでも同様に
      // $this->authorize('edit', $post);

      if(Gate::allows('edit', $post)) {
      			// $post->edit();
            return view('posts.edit')->with('post',$post);
      		} else {
      			// abort(403);
            return redirect('/')->with('message', 'No authorization');
      		}

      return view('posts.edit')->with('post',$post);
      }

      public function update(PostRequest $request, Post $post) {
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect ('/');
      }

      public function destroy(Post $post) {
        // if(Gate::allows('destroy', $post)) {
        //   $post->delete();
        //   return redirect('/');
        // }
        // else {
        //   return redirect('/')->with('message','no auth');
        // }
        $post->delete();
        return redirect('/');
      }


      public function __construct() {
        $this->middleware('auth')->except(['index', 'show']);
      }

}
