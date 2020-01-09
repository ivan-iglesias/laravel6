<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'body' => 'required'
        ]);

        $post = new Post();
        $post->slug = str::slug(request('title'));
        $post->title = request('title');
        $post->body = request('body');
        $post->save();

        return redirect('/posts');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'body' => 'required'
        ]);

        $post->slug = str::slug(request('title'));
        $post->title = request('title');
        $post->body = request('body');
        $post->save();

        return redirect('/posts/' . $post->id);
    }
}
