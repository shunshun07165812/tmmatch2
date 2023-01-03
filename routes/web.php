<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArtistController;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\GoogleAuthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get("/login/google", [
  GoogleAuthController::class,
  "redirectToGoogle",
]);

// 追加
Route::get("/login/google/callback", [
  GoogleAuthController::class,
  "handleGoogleCallback",
]);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/newuser',[UserController::class, 'index']);
    Route::put('/users/{user}', [UserController::class,'store']); //新規のプロフィール作成
    
    Route::get('/usersshow', [UserController::class ,'show']);
    Route::get('/mypage',[UserController::class,'home']);   //ログイン
    Route::get('/mypage/{user}',[UserController::class,'home_show']);
    Route::get('/mypage/{user}/edit',[UserController::class,'edit']); //プロフィール編集にいく
    Route::put('/mypage/{user}',[UserController::class,'update']);   //編集内容をアップデート
    Route::get('/mypage2/{user}',[UserController::class,'your']);
    Route::get('/tmmatch',[UserController::class,'my']);
    
    Route::get('/chat_room/{user}',[ChatController::class,'store']);//ルーム作成
    Route::get('/chat/{chat_room}',[ChatController::class,'chat']);
    Route::put('/chat/{chat_room}/message',[ChatController::class,'store1']);
    Route::get('/index',[ChatController::class,'index']);
    
    Route::post('/like/{from_user_id}',[LikeController::class,'store']);
    Route::post('/unlike/{from_user_id}',[LikeController::class,'destroy']);
    Route::get('/like',[LikeController::class,'index']);
    
    
    Route::get('/artist',[ArtistController::class,'show']);
    Route::put('/mypage',[ArtistController::class,'store']);
    
   
    
    
    Route::get('/serch',[ArtistController::class,'serch_show']);
    Route::get('/artist_serch',[ArtistController::class,'result']);
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    //Route::get('/',[UserController::class,'my']);
    
    Route::controller(PostController::class)->middleware('auth')->group(function () {
    Route::get('/',[UserController::class,'my']);
    //Route::get('/', 'index')->name('index');
    Route::post('/blogs','store')->name('store');
    Route::get('/blogs/create', 'create')->name('create');
    Route::get('/blogs/{blog}', 'show')->name('show');
    Route::put('/blogs/{blog}', 'update')->name('update');
    Route::delete('/blogs/{blog}', 'delete')->name('delete');
    Route::get('/blogs/{blog}/edit', 'edit')->name('edit');
});

require __DIR__.'/auth.php';
