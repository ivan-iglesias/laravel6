@extends ('layout')

@section ('content')

<h1>My Posts</h1>

<hr>

@foreach ($posts as $post)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->body }}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
@endforeach

@endsection
