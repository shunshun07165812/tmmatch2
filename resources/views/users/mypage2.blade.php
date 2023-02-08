<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>mypage</title>
        <style>
        a{
            text-decoration:none;
            color:#432;
        }
         a:hover{
            color:#0bd;
        }
        .body{
            text-align:center;
        }
         .profile{
            text-align:center;
            margin-top:8%;
        }
        .artist{
            text-align:center;
        }
        .good{
            text-align:center;
        }
        li{
            text-align:center
        }
        .blog{
            text-align:center;
        }
        </style>
    </head>
    <body>
        
        <h1>tmmatch</h1>
        <div class="box">
        <form action="/users/{{$user->id}}" method="POST">
            @csrf
            
            <div class="body">
            <p>名前：{{$user->name}}</p>
            <p>性別：{{$user->gender}}</p>
            <p>年齢:{{$user->age}}</p>
            <p>都道府県:{{$user->address}}</p>
            <p>一言:{{$user->self_introduction}}</p>
            </div>
            <div class="profile">
               <img src="{{$user->profile_image}}" alt="画像が読み込めません。" width="25%"/>
            </div>
            
        </form>
        </div>
        <div class="good">
        <form action="/like/{{$user->id}}" method="POST">
            @csrf
         <button type="submit">いいね</button>   
        </form>
        </div>
        
       
        @foreach ($user->artists as $artist)
                <p class='artist'>{{ $artist->name }}</p>
            @endforeach
        
        
        
        <li><a href="/tmmatch">tmmatch</a></li>
        <li><a href="/chat_room/{{$user->id}}">チャット</a></li>
       
        
        
        
        <!--blog-->
        <div class="blog">
        <h1>Blog Name</h1>
        <a href='/blogs/create'>create</a>
        <div class='posts'>
            @foreach ($user->blogs as $blog)
                <div class='post'>
                    <a href="/blogs/{{$blog->id}}"<p class='body'>{{ $blog->content }}</p></a>
                   
                </div>
            @endforeach
        </div>
        </div>
    </body>
</html>