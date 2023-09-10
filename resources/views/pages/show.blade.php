@extends('../layouts.app')

@section('content')
    <div class="container mt-3">

        <div class="intro">
            <h2>Send notification</h2>
            <p>Send a notification to all the users</p>
        </div>

        <ul>
            <li><a href="{{ route('index.sent') }}">Go to home page</a></li>
            <li><a href="{{ route('posts.all') }}">See all posts</a></li>
        </ul>

        @if (Session::has('success'))
            <div class="alert alert-info">{{ Session::get('success') }}</div>
        @endif
        <form action="{{ route('send.notification') }}" method="post">
            @csrf
            <div class="form-group">
                <textarea class="form-control" name="notifMsg" id="notifMsg" rows="5" placeholder="Add notification"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Send notification</button>
            </div>
        </form>

        <br><br>
        <div class="contentTable">
            <h2>All Subscribers</h2>
            <p>This is the list of all the subcribers</p>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Confirmation</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subscribers as $key => $subscribers)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $subscribers->email }}</td>
                            <td>{{ $subscribers->confirmation }}</td>
                            <td>{{ $subscribers->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
