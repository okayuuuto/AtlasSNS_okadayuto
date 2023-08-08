<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    //プロフィール画面遷移
    public function profile(){
        return view('users.profile');
    }

    //プロフィール更新
    public function profileUpdate(Request $request) {
        $validator = Validator::make($request->all(),[
            'username' => 'required|min:2|max:12',
            'mail' => ['required', 'min:5', 'max:40', 'email', Rule::unique('users')->ignore(Auth::id())],
            'newpassword' => 'required|min:8|max:20|confirmed|alpha_num',
            'newpassword_confirmation' => 'min:8|max:20|alpha_num',
            'bio' => 'max:150',
            'iconimage' => 'image|nullable|mimes:jpeg,png,bmp,gif,svg',
        ]);

        $user = Auth::user();

        //画像登録
        if($request->hasFile('iconimage')) {
            $image = $request->file('iconimage')->store('public/images');
            $user->images = basename($image);
        }

        $validator->validate();
        $user->update([
            'username' => $request->input('username'),
            'mail' => $request->input('mail'),
            'password' => bcrypt($request->input('newpassword')),
            'bio' => $request->input('bio'),
        ]);

        return redirect('/top');
    }

    //ユーザー一覧
    public function index(Request $request) {

        if ($request->has('search')) {
            return $this->search($request);
        }

        $users = User::where('id', '!=', Auth::id())->get();
        return view('users.search',['users'=> $users]);
    }

    //ユーザー検索
    public function search(Request $request){
        $keyword = $request->input('search');
        if(!empty($keyword)){
            $users = User::where('username','like','%'.$keyword.'%')
            ->where('id', '!=', Auth::id())
            ->orderBy('created_at', 'desc')->get();
        }else{
            $users = User::where('id', '!=', Auth::id())->orderBy('created_at', 'desc')->get();
        }

        return view('users.search', ['users' => $users, 'keyword' => $keyword]);
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
