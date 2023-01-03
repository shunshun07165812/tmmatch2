<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>mypage</title>
    </head>
    <body>
        
        <h1>mypage</h1>
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
                @if($user->profile_image !=='')
                <img src="{{ \Storage::url($user->profile_image)}}" width="25%">
                @else
                <p>画像なし</p>
                @endif
            </div>
            
        </form>
        <div class="edit"><p><a href="/mypage/{{ $user->id }}/edit">edit</a>(google認証の方はここに初期設定したください)</p></div>
       
        @foreach ($user->artists as $artist)
                <p class='artist'>{{ $artist->name }}</p>
            @endforeach
        <div class="footer">
            <p><a href="/artist">アーティスト追加</a>(google認証の方はここに初期設定したください)</p>
        </div>
        
        <ul>
        <li><a href="/serch">検索</a></li>
        <li><a href="/tmmatch">tmmatch</a></li>
        <li><a href="/index">chat一覧</a></li>
        <li><a href="/like">like一覧</a></li>
        </ul>
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>
        
        
        
        <!--blog-->
        <h1>Blog Name</h1>
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