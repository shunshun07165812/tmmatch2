<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
<body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/blogs/{{ $blog->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__blog'>
                <h2>本文</h2>
                <input type='text' name='blog[content]' value="{{ $blog->content }}">
            </div>
            <input type="submit" value="update">
        </form>
        <div class="footer">
            <a href="/mypage">戻る</a>
        </div>
    </div>
</body>
       
</html>