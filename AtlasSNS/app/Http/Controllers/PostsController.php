<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    //投稿内容の表示
    public function index(){
        $list = Post::orderBy('created_at','desc') -> get();
        // return view('posts.index');
        return view('posts.index',['list' => $list]);
        $list = Auth::user();
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), ['newPost' => 'required|max:200',], ['newPost.max' => '投稿は200文字以内で入力してください。',]);

        if($validator->fails()) {
            return redirect('/top')
            ->withErrors($validator)
            ->withInput();
        }

        $id = Auth::user()->id;
        $post = $request->input('newPost');
        Post::create(['user_id' => $id, 'post' => $post]);
        return redirect('/top');
    }
}
