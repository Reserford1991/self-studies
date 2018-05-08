@extends('bootstrap-blog.layout')

@section('container')

    <div class="col-sm-8 blog-main">

        <h1>Publish a post</h1>

        <hr>

        <form method=POST action="/posts">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Titile: </label>
                <input type="text" class="form-control" id="title" placeholder="Title" name="title">
            </div>
            <div class="form-group">
                <label for="text">Body: </label>
                <input type="text" class="form-control" id="text" placeholder="Text" name="body">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            @include('bootstrap-blog.errors')
        </form>
    </div>

@endsection