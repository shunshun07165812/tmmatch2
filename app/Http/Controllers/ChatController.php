<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat_room;
use App\Models\Message;
use App\Http\Requests\ChatRequest;
use Auth;
class ChatController extends Controller
{
   
   // chat_room生成
   public function store(User $user,Chat_room $chat_room){
      $user1=Auth::user();
      if(Chat_room::where(function ($query) use ($user,$user1) {
         $query->where('user_id_1',$user->id)->where('user_id_2',$user1->id);
      })->orWhere(function ($query) use ($user,$user1) {
         $query->where('user_id_1',$user1->id)->where('user_id_2',$user->id);
      })->exists()){
         
         $chat_room=Chat_room::WhereIn('user_id_1',[$user->id,$user1->id])->WhereIn('user_id_2',[$user->id,$user1->id])->first();
      } else {
         $chat_room['user_id_1']=Auth::id();
         $chat_room['user_id_2']=$user->id;
         $chat_room->save();
         
        
      }
      return redirect('/chat/'.$chat_room->id);
   }
   
   public function chat(Chat_room $chat_room, Message $message){
      
      return view('chats/chat')->with(['chat_room' =>$chat_room,'messages' =>$message->where('chat_room_id',$chat_room->id)->get()]);
   }
   
   public function store1(ChatRequest $chatrequest,User $user,Chat_room $chat_room,Message $message) //message store
   {
    
    $message->user_id=Auth::id();
    $message->chat_room_id=$chat_room->id;
    $input=$chatrequest['chat'];
    $message->fill($input)->save();
    
   
   
    return view('chats/chat')->with(['chat_room' => $chat_room,'messages' =>$message->where('chat_room_id',$chat_room->id)->get()]);
   }
   public function index(Chat_room $chat_room,User $user)
   {
    $user_id=Auth::id();
    //($chat_room->where('user_id_1',$user_id)->orWhere('user_id_2',$user_id)->get());
    return view('chats/index')->with(['user'=>Auth::user(),'chat_room'=>$chat_room->where('user_id_1',$user_id)->orWhere('user_id_2',$user_id)->get()]);
   }
}
