<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>Blog Name</h1>
        <form action="/blogs" method="POST">
            @csrf
            <div class="body">
                <h2>Body</h2>
                <textarea name="blog[content]" placeholder="今日も1日お疲れさまでした。"></textarea>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/mypage">戻る</a>
        </div>
    </body>
</html>