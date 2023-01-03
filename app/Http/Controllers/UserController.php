<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\ArtistRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
use App\Models\Artist;
use Auth;
class UserController extends Controller
{
     public function index(User $user)
    {
        
     $user=Auth::user();
     return view('users.new_users')->with(['user'=>$user]);
    }
    
    public function show(User $user)
    {
    $user=Auth::user();
    return view('users/show_users')->with(['user' => $user]);
    }
    
    //プロフィール作成　新規
    public function store(Request $request, User $user)
    {
   /** $input_user = $request['user'];
    
    $user->fill($input_user)->save();**/
    
    
    $image=base64_encode($request->file('profile_image'));
    $path=isset($image) ? $image->store('users', 'public'): '';
    $user['profile_image'] = $path;
    $input_user = $request['user'];
    $user->fill($input_user)->save();
    return redirect('/usersshow');
    }
    
    //プロフィール編集
     public function edit(User $user)
    {
     $user=Auth::user();   
    return view('users/mypage_edit')->with(['user' => $user]);
    }
    
    //編集内容をアップデート
    public function update(Request $request, User $user)
    {
    $image=$request->file('profile_image');
    $path=isset($image) ? $image->store('users', 'public'): '';
    $user['profile_image'] = $path;
    $input_user = $request['user'];
    $user->fill($input_user)->save();
    return redirect('/tmmatch');
    }
    
    public function home(User $user)
    {
    $user=Auth::user();
    return redirect('/mypage/' . $user->id);
    }
    
    public function home_show(User $user, Blog $blog, Artist $artist )
    {
    
     
    return view('users/mypage')->with(['user'=>$user, 'blogs'=>$blog->where('user_id',$user->id)->get(),
    'artists'=>$artist->where('user_id',$user->id)->get(),]);
    }
    
     public function my(User $user, Blog $blog, Artist $artist )
    {
     $user=Auth::user();
     
    return view('users/mypage')->with(['user'=>$user, 'blogs'=>$blog->where('user_id',$user->id)->get(),
    'artists'=>$artist->where('user_id',$user->id)->get()]);
    }
    
    public function your(User $user,Blog $blog,Artist $artist)
    {
     
      return view('users/mypage2')->with(['user'=>$user, 'blogs'=>$blog->where('user_id',$user->id)->get(),
    'artists'=>$artist->where('user_id',$user->id)->get()]);
    }
    
}
