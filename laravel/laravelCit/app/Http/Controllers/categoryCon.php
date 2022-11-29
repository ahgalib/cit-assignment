<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Image;
use Str;

class categoryCon extends Controller
{
    public function showCategoryPage(){
        $category = Category::all();
        return view('category.category',compact('category'));
    }

    public function saveCategory(Request $request){
        //return $request->all();
        $request->validate([
            'category_name'=>'required|unique:categories',
            'category_image'=>'required|mimes:png,jpg,jpeg|max:3000',
        ]);
        $cat_name = $request['category_name'];
        $upload_file = $request['category_image'];
        $extension = $upload_file->getClientOriginalExtension();
        $file_name = Str::lower(str_replace(' ','-',$cat_name)).'-'.rand(000000,999999).'.'.$extension;
        //echo $file_name;die;
        Image::make($upload_file)->resize(250,200)->save(public_path('/upload/category/'.$file_name));
        Category::create([
            'category_name'=> $request['category_name'],
            'category_image'=>$file_name,
        ]);

        return back();
    }

    public function deleteCategory($id){
        $image = Category::where('id',$id)->first();//first er por ->category_image likhle $file_path a $image er por['category_image']dite hobe na
        //echo $image;die;
        $file_path = public_path('/upload/category/'.$image['category_image']);
        unlink($file_path);
        Category::find($id)->delete();
        return back()->with('success','category deleted successfully');
    }



}
