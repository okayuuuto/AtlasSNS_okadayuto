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
}
