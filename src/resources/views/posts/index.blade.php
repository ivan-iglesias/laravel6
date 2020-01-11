@extends ('layout')

@section ('content')

<h1>My Posts</h1>

<hr>

@forelse ($posts as $post)
    <div class="card mb-3">
        <div class="card-body">
            <a href="{{ $post->path() }}">
                <h5 class="card-title">{{ $post->title }}</h5>
            </a>
            <p class="card-text">{{ $post->body }}</p>
        </div>
    </div>
@empty
    <p>No relevant posts yet.</p>
@endforelse

@endsection
