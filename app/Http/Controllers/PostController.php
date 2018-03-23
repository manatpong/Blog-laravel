<?php

namespace App\Http\Controllers;

use App\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        //$posts = Post::all();

        //$posts = Post::orderBy('created_at','desc')->get(); // เหมือน latest
        $posts = Post::latest()->get();

    	return view('posts.index',compact('posts'));
    }

    public function show($id)
    {
        $posts = Post::find($id);
    	return view('posts.show',compact('posts'));
    }

    public function create()
    {
    	return view('posts.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        //return view('posts.show');
        $post = new Post;
        $post->title = request('title');
        $post->body = request('body');
        $post->save();
        return redirect('/');
    }

    
}
