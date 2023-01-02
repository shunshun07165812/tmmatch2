<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>like artist</title>
    </head>
    <body>
        
        <h1>好きなアーティスト</h1>
        <form action="/mypage" method="POST">
            @csrf
            @method('PUT')
            <div class="body">
                
                <textarea name="artist[name]" placeholder="好きなアーティストを登録してください"></textarea>
                 
            </div>
            <input type="hidden" name="artist[user_id]" value="{{ $users->id }}">
            <input type="submit" value="保存"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>