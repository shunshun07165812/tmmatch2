<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>mypage</title>
    </head>
    <body>
        
        <h1>mypage編集</h1>
        <div class="content">
        <form action="/mypage/{{$user->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="body">
                <p>性別：<input type='text' name='user[gender]'  value="{{ $user->gender }}"></p>
                <p>年齢：<input type='text' name='user[age]' value="{{ $user->age }}"></p>
                <p>都道府県<input type='text' name='user[address]' value="{{ $user->address }}"></p>
                <p>一言<input type='text' name='user[self_introduction]' value="{{ $user->self_introduction }}"></p>
                <div class="profile">
                @if($user->profile_image !=='')
                <img src="{{ \Storage::url($user->profile_image)}}" width="25%">
                @else
                <p>画像なし</p>
                @endif
                </div>
                <p>写真：<input type='file' name='profile_image'></p>
                 
            </div>
            
            <input type="submit" value="update">
        </form>
        
            <div class="footer">
                <a href="/mypage">戻る</a>
            </div>
        </div>
    </body>
</html>