@extends('bootstrap-blog.layout')

@section('container')

    <div class="col-sm-8 blog-main">

        <div class="blog-post">
            <h2 class="blog-post-title"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
            <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }}</p>

            {{ $post->body }}
        </div><!-- /.blog-post -->

        @include('bootstrap-blog.pagination')

    </div><!-- /.blog-main -->

@endsection