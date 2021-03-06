<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){
        $posts = Post::Status()->get();
        return view('front.posts.index',[
            'posts' => $posts,
        ]);
    }
    public function show($id){
        $post = Post::Status()->findOrFail($id);
        return view('front.posts.show',[
            'post' => $post,
        ]);
    }
}
