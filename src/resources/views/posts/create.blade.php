@extends ('layout')

@section ('content')

<div id="wrapper">
    <h1>New Post</h1>

    <form method="POST" action="/posts">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text"
                   class="form-control"
                   name="title"
                   id="title"
                   autocomplete="off">
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control"
                      name="body"
                      id="body"
                      autocomplete="off"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
