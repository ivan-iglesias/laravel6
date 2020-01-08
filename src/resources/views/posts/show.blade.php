@extends ('layout')

@section ('content')

<h1>My Posts</h1>

<hr>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">{{ $post->body }}</p>
    </div>
</div>

@endsection
