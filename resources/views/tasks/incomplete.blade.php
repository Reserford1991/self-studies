<!DOCTYPE html>
<html>
<body>

@foreach ($subset as $subset)
    <li><a href="/task/{{ $subset['id'] }}">{{ $subset['body'] }}</a></li>
@endforeach

</body>
</html>