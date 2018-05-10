<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Blog Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
          crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/app.css" rel="stylesheet">
</head>

<body>


@include('bootstrap-blog.nav')


<div class="container">

    @include('bootstrap-blog.blog-header')

    <div class="row">

        @yield('container')

        @include('bootstrap-blog.sidebar')

    </div><!-- /.row -->

</div><!-- /.container -->

@include('bootstrap-blog.footer')
</body>
</html>
