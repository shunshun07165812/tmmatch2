<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>likes</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>like一覧</h1>
         @foreach ($likes_users as $like)
                <a href="/mypage2/{{$like->user1->id}}"><p class='like'>{{ $like->user1->name }}</p></
            @endforeach
    </body>
    <a href="/tmmatch">戻る</a>
</html>