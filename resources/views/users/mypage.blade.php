<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>mypage</title>
        <style>
        
        a{
            text-decoration:none;
        }
        .nav{
        display:flex;
        font-size:1.25rem;
        text-transform:uppercase;
        margint-op:34px;
        list-style:none;
        }
        .nav li{
            margin-left:36px;
            margin-top:15px;
            font-size:15px;
        }
            
        .nav a{
            color:#432;
        }
            
        .nav a:hover{
            color:#0bd;
        }
        .header{
            display:flex;
            justify-content:space-between;
        }
        .wrapper{
            max-width:1100px;
            margin:0 auto;
            padding:0 4%;
        }
        .profile-image{
            text-align:center;
            margin-top:8%;
        }
        .profile{
            text-align:center;
            margin-top:8%;
        }
        .artist{
            text-align:center;
        }
        .logout{
            text-align:center;
        }
        .blog{
            text-align:center;
        }
        
            
        </style>
    </head>
    <body>
        <header class="header wrapper">
        <h1><a href="/tmmatch">tmmatch</a></h1>
        <nav>
            <ul class="nav">
                
                <li><a href="/serch">検索</a></li>
                <li><a href="/index">チャット一覧</a></li>
                <li><a href="/like">いいね一覧</a></li>
                <li><a href="/mypage/{{ $user->id }}/edit">プロフィール編集</a></li>
            </ul>
        </nav>
        </header>
        <form action="/users/{{$user->id}}" method="POST">
            @csrf
            <div class="profile-image">
               <img src="{{$user->profile_image}}" alt="画像が読み込めません。" width="25%"/>
            </div>
            <div class="profile">
            <p>名前：{{$user->name}}</p>
            <p>性別：{{$user->gender}}</p>
            <p>年齢:{{$user->age}}</p>
            <p>都道府県:{{$user->address}}</p>
            <p>一言:{{$user->self_introduction}}</p>
            </div>
            
            
        </form>
       
        <div class="artist">
            <p><a href="/artist">アーティスト追加</a>(google認証の方はここに初期設定したください)</p>
        </div>
         @foreach ($user->artists as $artist)
                <p class='artist'>{{ $artist->name }}</p>
            @endforeach
        <div class="logout">
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            
                <button>logout</button>
        </form>
        </div>
        
        
        
        <!--blog-->
        <div class="blog">
        <h1>Blog</h1>
        <a href='/blogs/create'>create</a>
        <div class='posts'>
            @foreach ($user->blogs as $blog)
                <div class='post'>
                    <a href="/blogs/{{$blog->id}}"<p class='body'>{{ $blog->content }}</p></a>
                    <form action="/blogs/{{ $blog->id }}" id="form_{{ $blog->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $blog->id }})">delete</button> 
                    </form>
                </div>
            @endforeach
        </div>
        </div>
        <script>
            function deletePost(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
        
    </body>
</html>