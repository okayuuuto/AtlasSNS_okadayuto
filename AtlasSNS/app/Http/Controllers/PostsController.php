<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;

class PostsController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        return view('posts.index');
    }

    public function create(Request $request) {
        $id = Auth::user()->id;
        $post = $request->input('newPost');
        Post::create(['user_id' => $id, 'post' => $post]);
        // return redirect('index');
        return redirect('/top');
    }
}
