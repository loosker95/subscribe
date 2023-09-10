@extends('layouts.app')
@section('content')
<body>
    <div class="newsletter-subscribe">
        <div class="container">
            <div class="intro">

            <ul>
                <li><a href="{{route('subscribers.all')}}">See all the subscribers</a></li>
                <li><a href="{{ route('posts.all')}}">See all posts</a></li>
            </ul>
            
                <h2 class="text-center">Subscribe for our Newsletter</h2>
                <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae. </p>
                @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <form class="form-inline" action="{{route('index.subscribe')}}" method="post">
                @csrf
                <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Your Email"></div>
                <div class="form-group"><button class="btn btn-primary" type="submit">Subscribe </button></div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>   
@endsection


