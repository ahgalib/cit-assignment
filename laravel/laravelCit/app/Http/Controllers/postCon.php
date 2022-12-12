<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class postCon extends Controller
{
    public function showAddPost(){
        $category = Category::all();
        return view('admin.post.addPost',compact('category'));
    }

    public function savePost(Request $request){
        $request->validate([
            'category_id'=> 'required',
            'title'=> 'required',
            'short_desc'=> 'required',
            'description'=> 'required',
            'image'=> 'required',
        ]);

        return $request->all();
    }
}
