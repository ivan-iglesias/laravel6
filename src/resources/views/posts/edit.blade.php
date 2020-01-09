@extends ('layout')

@section ('content')

<div id="wrapper">
    <h1>Update Post</h1>

    <form method="POST" action="/posts/{{ $post->slug }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text"
                   class="form-control"
                   name="title"
                   id="title"
                   value="{{ $post->title }}"
                   autocomplete="off">
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control"
                      name="body"
                      id="body"
                      rows="15"
                      autocomplete="off">{{ $post->body }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection
