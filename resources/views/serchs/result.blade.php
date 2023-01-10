<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>検索</title>
        <style>
        a{
            text-decoration:none;
            color:#432;
        }
         a:hover{
            color:#0bd;
        }
        </style>
    </head>
    <body>
        <h1>検索結果</h1>
          @foreach ($artists as $artist)
          
                 <a href="/mypage2/{{$artist->user->id}}"<p class='artist'>{{ $artist->user->name }}</p></a>
            @endforeach
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <ul>
        <li><a href="/serch">検索</a></li>
        <li><a href="/tmmatch">tmmatch</a></li>
        </ul>
    </body>
</html>