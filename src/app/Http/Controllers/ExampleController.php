<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function Collection()
    {
        $tags = Post::first()->tags()->get();

        dd(
            $tags->first(function($tag) { return strlen($tag->name) < 7; })->toarray(),
            $tags->first(fn($tag) => strlen($tag->name) < 7 )->toarray()
        );

        $numbers = collect([1, 2, 3, [4, 5], 6]);

        dd(
            $numbers->flatten()->filter(fn($number) => $number > 4)
        );

        $tags = Post::with('tags')->get();

        dd(
            $tags->pluck('tags')->collapse()->pluck('name')->unique(),
            $tags->pluck('tags.*.name')->collapse()->unique()->map(fn($tag) => ucwords($tag))
        );
    }
}
