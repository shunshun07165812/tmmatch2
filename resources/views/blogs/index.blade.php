<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <a href='/blogs/create'>create</a>
        <div class='posts'>
            @foreach ($blogs as $blog)
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