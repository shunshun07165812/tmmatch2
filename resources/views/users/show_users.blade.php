<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
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
        @csrf
        <p>名前：{{$user->name}}</p>
        <p>性別：{{$user->gender}}</p>
        <p>年齢:{{$user->age}}</p>
        <p>都道府県:{{$user->address}}</p>
        <p>一言:{{$user->self_introduction}}</p>
        <div class="profile">
            <img src="{{$user->profile_image}}" alt="画像が読み込めません。" width="25%"/>
        </div>
         
        <div class="footer">
            <a href="/artist">次へ</a>
            <a href="/newuser">戻る</a>
        </div>
    </body>
</html>