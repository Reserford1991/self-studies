<!DOCTYPE html>
<html>
<body>

@foreach ($tasks as $task)
    <li><a href="/task/{{ $task->id }}">{{ $task->body }}</a></li>
@endforeach

</body>
</html>