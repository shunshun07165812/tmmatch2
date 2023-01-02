<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Artist;
use App\Models\Blog;
use App\Models\LikeUser;
use Auth;
class LikeController extends Controller
{
    /**
    public function store(User $user)
    {
        dd($user);
        $like=LikeUser::create([
            'to_user_id'=>\Auth::user()->id,
            'from_user_id'=>$user->id,
           
        ]);
        return redirect('/mypage2/'.$user->id);
    }
    
    public function index(User $user)
    {
        $is_like = auth()->user()->is_likes()->get(); 
        return view('likes/like')->whth(['is_likes'=>$is_like]);
    }
   **/
   
   public function store($from_user_id,User $user,Blog $blog,Artist $artist)
   {
       $user=Auth::user();
       Auth::user()->like($from_user_id);
        return view('users/mypage')->with(['user'=>$user, 'blogs'=>$blog->where('user_id',$user->id)->get(),
          'artists'=>$artist->where('user_id',$user->id)->get()]);
   }
   
   public function destroy($from_user_id)
   {
       Auth::user()->unlike($from_user_id);
       return 'ok';
   }
   
   public function index(User $user,LikeUser $likeuser)
   {
       
       $to_user_id=Auth::id();
       
       return view('likes/index')->with(['user'=>$user,'likes_users'=>$likeuser->where('to_user_id',$to_user_id)->get()]);
   }
}
