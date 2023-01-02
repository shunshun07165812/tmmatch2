<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeUser extends Model
{
    use HasFactory;
    
    protected $fillable=['to_user_id','from_user_id'];
    
    protected $table='likes_users';
    
    public function user1()
{
    return $this->belongsTo(User::class,'from_user_id');
}
    
}
