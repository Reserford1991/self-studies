@extends('bootstrap-blog.layout')

@section('container')
    <div class="col-sm-8 blog-main">
        @foreach($posts as $post)
            @include('posts.post')
        @endforeach




        @include('bootstrap-blog.pagination')
    </div><!-- /.blog-main -->

@endsection