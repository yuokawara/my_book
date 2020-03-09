@extends('layouts.front')

@section('content')
<!-- Navigasion -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ action('BookController@index') }}">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ action('Admin\BookController@create') }}">Create</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ action('Admin\BookController@index') }}">Edit</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ action('HomeController@index') }}">Register</a>
            </li>
        </ul>
    </div>
</nav>

<!-- End Navigation -->
<div class="container">

    <div class="row">
        <div class="posts col-md-8 mx-auto mt-3">
            @foreach($posts as $post)
            <div class="post">
                <div class="row">
                    <div class="text col-md-6">
                        <div class="date">
                            {{ $post->updated_at->format('Y年m月d日') }}
                        </div>
                        <div class="title">
                            {{ Str::limit($post->title, 150) }}
                        </div>
                        <div class="body mt-3">
                            {{ Str::limit($post->body, 1500) }}
                        </div>
                        <div class="title">
                            {{ Str::limit($post->page1, 150) }}Page
                        </div>
                        <div class="body">
                            {{ Str::limit($post->word1, 150) }}
                        </div>
                        <div class="title">
                            {{ Str::limit($post->page2, 150) }}Page
                        </div>
                        <div class="body">
                            {{ Str::limit($post->word2, 150) }}
                        </div>
                        <div class="title">
                            {{ Str::limit($post->page3, 150) }}Page
                        </div>
                        <div class="body">
                            {{ Str::limit($post->word3, 150) }}
                        </div>
                        <div class="title mt-2">
                            {{ Str::limit($post->important, 150) }}
                        </div>
                        <div class="title mt-2">
                            {{ Str::limit($post->plan, 150) }}
                        </div>
                        <div class="title mt-3 text-center">
                            {{ Str::limit($post->action, 150) }}
                        </div>
                    </div>
                    <div class="image col-md-6 text-right mt-4">
                        @if ($post->image_path)
                        <!-- <img src="{{ $post->image_path }}"> -->
                        <img src="{{ asset('storage/image/' . $post->image_path) }}">
                        @endif
                    </div>
                </div>
            </div>
            <hr color="#c0c0c0">
            @endforeach
        </div>
    </div>
</div>
<div class="d-flex justify-content-center">
    {{ $posts->links() }}
</div>
</div>
@endsection
