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

    /**
     * Los Facades son un proxy a clases. Se encuentran en:
     *
     * vendor/laravel/framework/src/Illuminate/Support/Facades/*
     */
    public function facade1()
    {
        \Illuminate\Support\Facades\Cache::remember('foo', 60, fn() => 'foobar');

        return \Illuminate\Support\Facades\Cache::get('foo');
    }

    /**
     * Podemos ver en getFacadeAccessor la key usada en el service container para
     * ver a que clase hace referencia y ser mas explicitos con las clases usadas
     * (recomendable cuando usamos muchas).
     *
     * - En el propio Facade, la línea "@see \Illuminate\Cache\Repository"
     * - Mediante tinker: resolve('<key>')
     *
     * Podemos usar la clase o su interfaz:
     *      \Illuminate\Cache\Repository
     *      \Illuminate\Contracts\Cache\Repository
     */
    public function facade2(\Illuminate\Contracts\Cache\Repository $cache)
    {
        $cache->remember('foo', 60, fn() => 'foobar');

        return $cache->get('foo');
    }
}
