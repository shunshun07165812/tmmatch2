<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        
        'name',
        'email',
        'password',
        'age',
        'gender',
        'address',
        'self_introduction',
        'profile_image',
        "google_id",
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    
    public function artists()
    {
        return $this->hasMany(Artist::class);
    }
    
    public function chat_rooms()
    {
        return $this->hasMany(Chat_room::class);
    }
    
    public function messages()
    {
        return $this->hasMany(Chat_room::class); 
    }
    
   
   public function likes()
   {
       return $this->belongsToMany(User::class,'likes_users','from_user_id','to_user_id')->withTimeStamps();
   }
   
   //userに対して既にいいねしたかの判別
   public function isLike($from_user_id)
   {
       return $this->likes()->where('from_user_id',$from_user_id)->exists();
   }
   
   //islikeを使って判別したあといいねする
   public function like($from_user_id)
   {
       if($this->isLike($from_user_id)){
           //なにもしない
           
       }else{
          
           $this->likes()->attach($from_user_id);
       }
   }
   
   public function unlike($from_user_id)
   {
       if($this->isLike($from_user_id)){
           //既にいいねがあったら解除
           $this->likes()->detach($from_user_id);
       }
   }

}
