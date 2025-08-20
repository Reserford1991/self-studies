<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Repositories\PostsRepository;
use Carbon\Carbon;

class PostsController extends Controller
{

    public function __construct() {
        $this->middleware('auth')->except(['index', 'show', 'showBlog', 'showPost']);
    }

    public function index() {
        return view('bootstrap-layouts.container');
    }


    public function showBlog(PostsRepository $posts, \App\Tag $tag = null) {

        //short way to do
        $archives = \App\Post::archives();

        $posts = $posts->all();

//        dd($posts);

        return view('posts.index', compact('posts', 'archives'));
    }

    public function showPost($id){
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store()
    {

        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        // create new post using request data
        // save to database

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

        session()->flash('message', 'Your post has now been published.');

        // redirect to post posts page

        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
}
