<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat_room extends Model
{
    use HasFactory;
    
   
   
   protected $fillable = [
    'id',
    'user_id_1',
    'user_id_2',
];
   
   public function user()
{
    return $this->belongsTo(User::class);
}
    public function user1()
{
    return $this->belongsTo(User::class,'user_id_1');
}
    public function user2()
{
    return $this->belongsTo(User::class,'user_id_2');
}

    public function messages()
{
        return $this->hasMany(Chat_room::class); 
}
}
