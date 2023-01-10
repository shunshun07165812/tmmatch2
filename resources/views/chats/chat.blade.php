<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>chat</title>
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
        <h1>chat</h1>
        <form action="/chat/{{$chat_room->id}}/message" method='POST'>
            @csrf
            @method('PUT')
             <textarea name="chat[message]" placeholder="今日も1日お疲れさまでした。"></textarea>
             <input type="submit" value="store"/>
        </form>
        @foreach($messages as $message)
        <p>{{$message->user->name}}:{{$message->message}}</p>
        
        @endforeach 
         <li><a href="/tmmatch">tmmatch</a></li>
    </body>
</html>