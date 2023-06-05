<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    //ユーザー一覧
    public function index() {

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
            $users = User::where('username','like','%'.$keyword.'%')->orderBy('created_at', 'desc')->get();
        }else{
            $users = User::where('id', '!=', Auth::id())->orderBy('created_at', 'desc')->get();
        }

        return view('users.search', ['users' => $users, 'keyword' => $keyword]);
    }
}
