<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArtistRequest;
use App\Models\User;
use App\Models\Artist;
use App\Http\Controllers\UserController;
use Auth;
class ArtistController extends Controller
{
    public function show(User $user,Artist $artist)
    {
        
        $user=Auth::user();
        $artist->user_id=$user;
       
        return view('users/artist')->with(['artists' => $artist->get(), 'users' => $user]);
    }
    
     public function store(ArtistRequest $artistrequest,User $user,Artist $artist)
    {
        
        $artist->user_id=$user=Auth::user()->id;
        $input = $artistrequest['artist'];
        $artist->fill($input)->save();
        return redirect('/mypage/' . $artist->user_id);
    }
    
    public function serch_show(User $user,Artist $artist)
    {
        $user=Auth::user();
        $artist->user_id=$user;
       
        return view('serchs/serch');
        
    }
    
    public function result(User $user,Artist $artist,Request $request)
    {
        $user1=Auth::id();
        $input = $request['name'];
        if(!empty($input)){
            $artists=$artist->where('name',$input)->where('user_id','!=',$user1)->get();
            return view('serchs/result')->with(['artists'=>$artists]);
        }
    }
}
