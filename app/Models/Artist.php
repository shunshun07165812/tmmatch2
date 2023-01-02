<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'user_id',
        'name',
 ];
 
 public function user()
 {
     return $this->belongsto(User::class);
 }
}
