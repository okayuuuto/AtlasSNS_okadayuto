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
        $postList = Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('followed_id'))->latest() -> get();
        $followList = Auth::user()->follows;

        return view('follows.followList',['postList' => $postList, 'followList' => $followList,]);
    }

    //フォロワーリスト
    public function followerList(){
        $postList = Post::query()->whereIn('user_id', Auth::user()->followers()->pluck('following_id'))->latest() -> get();
        $followerList = Auth::user()->followers;
        return view('follows.followerList',['postList' => $postList, 'followerList' => $followerList,]);
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
