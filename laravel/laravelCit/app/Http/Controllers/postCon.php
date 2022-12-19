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
    public function showPost(){
        $post = Post::where('author_id',Auth::id())->get();
        return view('admin.post.post',compact('post'));
    }

    public function showAddPost(){
        $category = Category::all();
        $tag = Tag::all();
        return view('admin.post.addPost',compact('category','tag'));
    }

    public function savePost(Request $request){
        $request->validate([
            'category_id'=> 'required',
            'title'=> 'required',
            'short_desc'=> 'required',
            'description'=> 'required',
            'tag_id'=> 'required',
            'image'=> 'required',
        ]);

        //multile tag
        $after_imploade = implode(',',$request->tag_id);
        $image = $request['image'];
        $image_ext = $image->getClientOriginalExtension();
        $image_name = rand(11111,9999).'.'.$image_ext;
        //echo $image_name;die;
        Image::make($image)->save(public_path('upload/posts/'.$image_name));
        Post::create([
            'author_id'=>Auth::user()->id,//short-cut Auth::id()
            'category_id'=>$request['category_id'],
            'title'=>$request['title'],
            'short_desc'=>$request['short_desc'],
            'description'=>$request['description'],
            'tag_id' =>$after_imploade,
            'image'=> $image_name,
            'slug'=>Str::lower(str_replace(' ','-',$request->title).rand(1111,9999)),
        ]);
        return back();
    }

    public function editpost($id){
        $post = Post::find($id);
        $category = Category::all();
        $tagName = Tag::all();

        $expl_tag = explode(',',$post->tag_id);
        foreach($expl_tag as $sin_tag){
            $tagId = Tag::where('id',$sin_tag)->get();
        }
        return view('admin.post.editPost',compact('post','category','tagName','tagId'));
    }

    public function viewPost($id){
        $post = Post::find($id);
        $category = Category::all();
        $tag = Tag::all();
        return view('admin.post.viewPost',compact('post','category','tag'));
    }
}
