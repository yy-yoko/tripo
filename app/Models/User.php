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

    protected $fillable = [
        'name',
        'email',
        'password',
        'profile',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function tripposts(){
        return $this->hasMany(Trippost::class);
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount('tripposts','followings','followers','favorites');
    }
    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }
    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }
   
   public function follow($userId)
    {
        $exist = $this->is_following($userId);
        $its_me = $this->id == $userId;
        
        if ($exist || $its_me) {
            return false;
        } else {
            $this->followings()->attach($userId);
            return true;
        }
    }
    
    public function unfollow($userId)
    {
        $exist = $this->is_following($userId);
        $its_me = $this->id == $userId;
        
        if ($exist && !$its_me) {
            $this->followings()->detach($userId);
            return true;
        } else {
            return false;
        }
    }
    public function is_following($userId)
    {
        return $this->followings()->where('follow_id', $userId)->exists();
    }
    
   public function feed_Tripposts()
    {
        $userIds = $this->followings()->pluck('users.id')->toArray();
        $userIds[] = $this->id;
        return Trippost::whereIn('user_id', $userIds);
    }
    
    // この投稿をお気に入り中のユーザ。（Userモデルとの関係を定義）
    public function favorites()
    {
        return $this->belongsToMany(Trippost::class,'favorites','user_id','trippost_id')->withTimestamps();        
    }
    
    // $trippost_idで指定された投稿をお気に入りにする。
    public function favorite($tripposts)
    {
        $exist = $this->is_favorite($tripposts);
        
        if($exist) {
            return false;
        } else {
            $this->favorites()->attach($tripposts);
            return true;
        }
    }
    
    public function unfavorite($tripposts)
    {
        $exist = $this->is_favorite($tripposts);

        if ($exist) {
            $this->favorites()->detach($tripposts);
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * 指定されたtrippost_idの投稿をこのユーザがお気に入り中であるか調べる。お気に入り中ならtrueを返す。
     */
    public function is_favorite($tripposts)
    {
        return $this->favorites()->where('trippost_id',$tripposts)->exists();
    }

}
   

