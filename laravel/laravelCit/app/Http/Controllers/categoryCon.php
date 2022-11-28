<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Image;

class categoryCon extends Controller
{
    public function showCategoryPage(){
        $category = Category::all();
        return view('category.category',compact('category'));
    }

    public function saveCategory(Request $request){
        //return $request->all();

    }
}
