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
               <img src="{{$user->profile_image}}" alt="画像が読み込めません。" width="25%"/>
            </div>
            
        </form>
        <form action="/like/{{$user->id}}" method="POST">
            @csrf
         <button type="submit">いいね</button>   
        </form>
        
       
        @foreach ($user->artists as $artist)
                <p class='artist'>{{ $artist->name }}</p>
            @endforeach
        
        
        
        <li><a href="/tmmatch">tmmatch</a></li>
        <li><a href="/chat_room/{{$user->id}}">chat</a></li>
       
        
        
        
        <!--blog-->
        <h1>Blog Name</h1>
        <a href='/blogs/create'>create</a>
        <div class='posts'>
            @foreach ($user->blogs as $blog)
                <div class='post'>
                    <a href="/blogs/{{$blog->id}}"<p class='body'>{{ $blog->content }}</p></a>
                   
                </div>
            @endforeach
        </div>
       {{-- <script>
            function like(from_user_id) {
              $.ajax({
                headers: {
                  "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                url: `/like/${from_user_id}`,
                type: "POST",
              })
                .done(function (data, status, xhr) {
                  console.log(data);
                })
                .fail(function (xhr, status, error) {
                  console.log();
                });
            }
        </script>--}}
    </body>
</html>