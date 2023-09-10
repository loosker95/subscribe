@extends('../layouts.app')


@section('content')
    <div class="container mt-3">
        <div class="intro">
            <h2>Welcome to the posts page</h2>
            <p>See all the posts here</p>
        </div>

        <ul>
            <li><a href="{{ route('index.sent') }}">Go to home page</a></li>
            <li><a href="{{ route('subscribers.all') }}">See all the subscribers</a></li>
        </ul>
        <hr>

        @forelse ($posts as $key => $post)
            <h4>{{ $key + 1 }}. {{ $post->title }}</h4>
            <p>{{ $post->content }}</p>
            <ul>
                @foreach ($post->comments as $item)
                    <li>
                        <i>{{ $item->comment }}</i>
                    </li>
                @endforeach
            </ul>
            <br>
        @empty
            <p>There is no post avalaible</p>
        @endforelse
    </div>
@endsection
