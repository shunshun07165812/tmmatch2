<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
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
        <h1>chat room一覧</h1>
         @foreach ($chat_room as $chat)
               @if($chat->user_id_1 != $user->id)
               <a href="/chat/{{$chat->id}}"> <p class='chat'>{{ $chat->user1->name }}</p></a>
               @else
               <a href="/chat/{{$chat->id}}"> <p class='chat'>{{ $chat->user2->name }}</p></a>
               @endif
            @endforeach
    </body>
    <a href="/tmmatch">戻る</a>
</html>