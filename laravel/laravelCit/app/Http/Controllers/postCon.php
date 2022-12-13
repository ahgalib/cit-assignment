<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Image;
use Auth;
use Str;

class postCon extends Controller
{
    public function showAddPost(){
        $category = Category::all();
        $tag = Tag::all();
        return view('admin.post.addPost',compact('category','tag'));
    }

    public function savePost(Request $request){
        // $request->validate([
        //     'category_id'=> 'required',
        //     'title'=> 'required',
        //     'short_desc'=> 'required',
        //     'description'=> 'required',
        //     'image'=> 'required',
        // ]);
        $image = $request['image'];
        $image_ext = $image->getClientOriginalExtension();
        $image_name = rand(11111,9999).'.'.$image_ext;
        //echo $image_name;die;
        Image::make($image)->save(public_path('upload/posts/'.$image_name));
        Post::create([
            'user_id'=>Auth::user()->id,
            'category_id'=>$request['category_id'],
            'title'=>$request['title'],
            'short_desc'=>$request['short_desc'],
            'description'=>$request['description'],
            'tag_id' =>$request['tag_id'],
            'image'=> $image_name,
            'slug'=>Str::lower(str_replace(' ','-',$request->title).rand(1111,9999)),
        ]);
        return back();
    }
}
