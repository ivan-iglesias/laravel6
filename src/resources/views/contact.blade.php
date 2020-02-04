@extends ('layouts.app')

@section ('content')

<div class="card col-6 offset-3">
    <div class="card-body">
        <form method="POST" action="/contact">
            @csrf

            <div class="form-group">
                <label for="email">Email Address</label>
                <input
                    type="text"
                    name="email"
                    class="form-control @error('email') is-invalid @enderror">

                @error('email')
                    <p class="font-weight-light text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Email me</button>

            @if (session('message'))
                <div>
                    <p class="font-weight-light text-success">{{ session('message') }}</p>
                </div>
            @endif
        </form>
    </div>
</div>

@endsection
