<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;


class FrontEndCon extends Controller
{
    public function index(){
        $post = Post::orderBy('id','desc')->limit(2)->get();
        $recent_post = Post::orderBy('id','desc')->limit(7)->get();
        $popular_post = Post::limit(4)->get();
        $category = Category::all();
        $tag = Tag::all();
        return view('front_end.index',compact('post','recent_post','popular_post','category','tag'));
    }

    public function singlePost($slug){
        $post = Post::where('slug',$slug)->first();
        return view('front_end.singlePost',compact('post'));
    }
}
