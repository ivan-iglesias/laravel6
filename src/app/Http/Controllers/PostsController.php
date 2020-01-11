<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index()
    {
        if (request('tag')) {
            $posts = Tag::where('name', request('tag'))->firstOrFail()->posts;
        }
        else {
            $posts = Post::latest()->get();
        }

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

        return redirect(route('posts.index'));
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

        return redirect($post->path());
    }

    protected function validateArticle()
    {
        return request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'body' => 'required'
        ]);
    }
}
