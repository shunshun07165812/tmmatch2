<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>blogs</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $blog->content }}</p>    
            </div>
        <div class="edit"><a href="/blogs/{{ $blog->id }}/edit">edit</a></div>
        <div class="footer">
            <a href="/mypage">戻る</a>
        </div>
    </body>
</html>