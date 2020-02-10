@extends ('layouts.app')

@section ('content')

<div class="card col-6 offset-3">
    <div class="card-body">
        <form method="POST" action="/payments">
            @csrf

            <button type="submit" class="btn btn-primary">Notification</button>

        </form>
    </div>
</div>

@endsection
