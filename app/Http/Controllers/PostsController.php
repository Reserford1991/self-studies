<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index() {
        return view('bootstrap-layouts.container');
    }


    public function showBlog() {

        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function showPost($id){
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store() {

        $this->validate(request(), [
          'title' => 'required',
          'body' => 'required'
        ]);

        // create new post using request data
        // save to dabase
        Post::create([
          'title' => request('title'),
          'body' => request('body')
        ]);

        // redirect to post home page

        return view('posts.index');

    }
}
