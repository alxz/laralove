@extends('layouts.layout')

@section('content')

    @if (isset($_GET['search']))
        @if(count($posts) > 0)
            <h2>The result of the search for <?=$_GET['search'] ?></h2>
            <p class="lead">Total posts found {{ count($posts) }}</p>
        @else
            <h2>Nothing found related to <?=$_GET['search'] ?></h2>
            <a href="{{ route('post.index') }}" class="btn btn-outline-primary">Show all posts</a>
        @endif
    @endif

    <div class="row">
        @foreach($posts as $post)
        <div class="col-6">
            <div class="card">
                <div class="card-header"><h2>{{ $post->short_title }}</h2></div>
                <div class="card-body">
                    <div class="card-img" style="background-image: url({{ $post->img ?? asset('img/oldTimerLogo.png') }})"></div>
                    <div class="card-author">Author: {{ $post->name }}</div>
                    <a href="" class="btn btn-outline-primary">View the post</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @if (!isset($_GET['search']))
    {{ $posts->links() }}
        @endif

@endsection
