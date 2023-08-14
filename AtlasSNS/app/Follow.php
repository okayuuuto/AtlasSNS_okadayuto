<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Auth;

class Follow extends Model
{
    //

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
