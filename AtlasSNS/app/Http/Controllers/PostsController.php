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
        return view('posts.index',['list' => $list]);
        $list = Auth::user();
    }

    //投稿内容の登録
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

    // 投稿編集画面
    public function edit($id) {

        $post = \DB::table('posts')
        ->where('id', $request->id)
        ->get();
        return view('top', compact('post'));
    }

    public function update(Request $request) {

        //ここを有効化するとTOP画面とモーダル内にエラーメッセージが表示される。
        // $validator = Validator::make($request->all(), ['upPost' => 'required|max:200',], ['upPost.max' => '投稿は200文字以内で入力してください。',]);

        // if($validator->fails()) {
        //     return redirect('/top')
        //     ->withErrors($validator)
        //     ->withInput();
        // }

        $id = Auth::user()->id;
    $post = $request->input('upPost');
    $post_id = $request->input('id');
    $post = Post::find($post_id);
    $post->post = $request->input('upPost');
    $post->save();
    return redirect('/top');
    }
}
