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
        $validatedAttributes = $this->validateArticle();

        $validatedAttributes['slug'] = str::slug(request('title'));

        Post::create($validatedAttributes);

        return redirect('/posts');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validatedAttributes = $this->validateArticle();

        $validatedAttributes['slug'] = str::slug(request('title'));

        $post->update($validatedAttributes);

        return redirect('/posts/' . $post->slug);
    }

    protected function validateArticle()
    {
        return request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'body' => 'required'
        ]);
    }
}
