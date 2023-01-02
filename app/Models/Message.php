<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
    'message',
    ];
    public function user()
{
    return $this->belongsto(User::class);
}

    public function chat_room()
{
    return $this->belongsto(Chat_room::class);
}
}
