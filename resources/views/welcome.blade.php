<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
          crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>

<div >

    @if ($flash = session('message'))
        <div id="flash-message" class="alert alert-success" role="alert">
            {{$flash}}
        </div>
    @endif

Where do you want to go?
<ol>
    <li><a href="/tasksIndex">Laravel from scratch lessons 1-9 (tasks)</a></li>
    <li><a href="/postsIndex">Laravel from scratch lesson 10 (posts)</a></li>
    <li><a href="/posts/showBlog">Laravel from scratch lessons 11-16 (posts)</a></li>
    <li><a href="/posts/showBlog">Laravel from scratch lessons 17-... (posts)</a></li>
</ol>

</body>
</html>