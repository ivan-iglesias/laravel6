@extends ('layout')

@section ('content')

<div id="wrapper">
    <h1>New Post</h1>

    <form method="POST" action="{{ route('posts.index') }}">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input
                type="text"
                name="title"
                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                autocomplete="off"
                value="{{ old('title') }}">

            @if ($errors->has('title'))
                <p class="font-weight-light text-danger">{{ $errors->first('title') }}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea
                name="body"
                class="form-control @error('body') is-invalid @enderror"
                autocomplete="off"
            >{{ old('body') }}</textarea>

            @error('body')
                <p class="font-weight-light text-danger">{{ $errors->first('body') }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
