<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class='posts'>
            @foreach ($is_likes as $like)
                <div class='post'>
                    <a href="/users/{{$like->id}}"<p class='body'>{{ $like->name }}</p></a>
                </div>
            @endforeach
        </div>
    </body>
</html>