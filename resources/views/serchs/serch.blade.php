<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>検索</title>
    </head>
    <body>
        <h1>検索</h1>
        <form action="/artist_serch" method="GET">
            @csrf
            <div class="body">
                <h2>検索</h2>
            <input type="text" class="serch" name="name">
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/tmmatch">戻る</a>
        </div>
    </body>
</html>