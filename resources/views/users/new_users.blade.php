<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>mypage</title>
    </head>
    <body>
        
        <h1>mypage</h1>
        <form action="/users/{{$user->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="body">
                <p>性別：<input type='text' name='user[gender]'></p>
                <p>年齢：<input type='text' name='user[age]'></p>
                <p>都道府県<input type='text' name='user[address]'></p>
                <p>一言<input type='text' name='user[self_introduction]'></p>
                <p>写真：<input type='file' name='profile_image'></p>
                 
            </div>
            
            <input type="submit" value="store"/>
        </form>
        
    </body>
</html>