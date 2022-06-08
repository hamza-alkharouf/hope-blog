<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>
</head>
<body>
    <h2>Categories</h2>
    @foreach ($categories as $Category)
    <article>
        <a href="{{ route('categories.show', [$Category['id']]) }}">{{ $Category['name'] }}</a>
    </article>
    <hr>
    @endforeach
</body>
</html>