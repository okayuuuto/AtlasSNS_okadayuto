<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;

class FollowsController extends Controller
{
    //フォローリスト
    public function followList(){
        $list = Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('followed_id'))->latest() -> get();
        return view('follows.followList',['list' => $list]);
        $list = Auth::user();
    }

    //フォロワーリスト
    public function followerList(){
        $list = Post::query()->whereIn('user_id', Auth::user()->followers()->pluck('following_id'))->latest() -> get();
        return view('follows.followerList',['list' => $list]);
        $list = Auth::user();
    }

    //フォロー
    public function follow(User $user) {
        $follower = Auth::user();
        //フォローしているか
        $is_following = $follower->isFollowing($user);
        if(!$is_following) {
            //フォローしていなければフォローする
            $follower->follow($user->id);
        }
        return redirect()->back();
    }

    //フォロー解除
    public function unfollow(User $user) {
        $follower = Auth::user();
        //フォローしているか
        $is_following = $follower->isFollowing($user);
        if($is_following) {
            //フォローしていればフォローを解除する
            $follower->unfollow($user->id);
        }
        return redirect()->back();
    }
}
