<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use Image;
use Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class categoryCon extends Controller
{
    public function showCategoryPage(){
        $category = Category::all();
        return view('admin.category.category',compact('category'));
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

    public function editCategory($id){
        $category = Category::find($id);
        return view('admin.category.editCategory',compact('category'));
    }

    public function saveEditCategory(Request $request,$id){
        //return $request->all();
        $request->validate([
            'category_name'=>'required',
            'category_image'=>'mimes:png,jpg,jpeg|max:3000',
        ]);
        if($request->category_image){
            //echo "image update hobe";
            $imageFind = Category::find($id);
            $image =  $imageFind['category_image'];
            $imagePath = public_path('/upload/category/'.$image);
            unlink($imagePath);

            $file_name = $request['category_image'];
            $file_ext = $file_name->getClientOriginalExtension();
            //echo $file_ext;
             $file_new_name = Str::lower(str_replace(" ","-",$request['category_name']))."-".rand(00000,99999).".".$file_ext;
             //echo $file_new_name;
             Image::make($file_name)->save(public_path('/upload/category/'.$file_new_name));
             Category::find($id)->update([
                'category_name'=> $request['category_name'],
                'category_image'=>$file_new_name,
             ]);
             return redirect('/showCategory');
        }else{
            //echo "image update hobe na khali category update hobe"
            Category::find($id)->update([
                'category_name'=> $request['category_name'],

             ]);
            return redirect('/showCategory');
        }

    }

    public function showTagPage(){
        $tag = Tag::all();
        return view('admin.category.tag',compact('tag'));
    }

    public function saveTag(Request $request){
       // return $request->all();die;
        $request->validate([
            'tag_name'=>'required|unique:tags',
        ]);

        Tag::create([
            'tag_name'=> $request['tag_name'],
        ]);

        return back();
    }

    public function showRolePage(){
        $permission = Permission::all();
        $role = Role::all();
        return view('admin.role',compact('permission','role'));
    }

    public function savePermission(Request $request){
        $permission = Permission::create([
            'name' => $request['permission_name'],
        ]);
        return back();
    }

    public function saveRole(Request $request){
        //return  $request->all();
        $role = Role::create([
            'name' => $request['role_name'],
        ]);
        $role->givePermissionTo($request['permission']);
        return back();
    }

}
