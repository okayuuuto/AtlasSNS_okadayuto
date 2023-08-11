<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;
use App\Follow;

class User extends Authenticatable
{
    //post_tableとのリレーション
    public function posts() //一人のユーザーに対し多数の投稿なので複数
    {
        return $this-> hasMany(Post::class);
    }

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password', 'bio', 'images',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //followsテーブルとのリレーション
    public function follows() {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'followed_id');
    }

    public function followers() {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'following_id');
    }

    //フォローする
    public function follow(Int $user_id) {
        return $this->follows()->attach($user_id);
    }

    //フォロー解除する
    public function unfollow(Int $user_id) {
        return $this->follows()->detach($user_id);
    }

    //フォローしているか
    public function isFollowing(User $user) {
    return (boolean) $this->follows()->where('followed_id', $user->id)->exists();
    }

    //フォローされているか
    public function isFollowed(User $user) {
    return (boolean) $this->followers()->where('following_id', $user->id)->exists();
    }

}
