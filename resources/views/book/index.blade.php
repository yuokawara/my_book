@extends('layouts.front')

@section('content')
<div class="container">
    <hr color="#c0c0c0">
    @if (!is_null($headline))
    <div class="row">
        <div class="headline col-md-10 mx-auto">
            <div class="row">
                <div class="col-md-6">
                    <div class="caption mx-auto">
                        <div class="image">
                            @if ($headline->image_path)
                            <img src="{{ $headline->image_path }}">
                            @endif
                        </div>
                        <div class="title p-2">
                            <h1>{{ Str::limit($headline->title, 70) }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <p class="body mx-auto">{{ Str::limit($headline->body, 650) }}</p>
                    <div class="title p-2">
                        <h2>{{ Str::limit($headline->word1, 70) }}</h2>
                        <h2>{{ Str::limit($headline->word2, 70) }}</h2>
                        <h2>{{ Str::limit($headline->word3, 70) }}</h2>
                    </div>
                    <div class="title p-2">
                        <h4>{{ Str::limit($headline->important, 70) }}</h4>
                        <h3>{{ Str::limit($headline->plan, 70) }}</h3>
                        <h2>{{ Str::limit($headline->action, 70) }}</h2>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endif
    <hr color="#c0c0c0">
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
                        <img src="{{ $post->image_path }}">
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
