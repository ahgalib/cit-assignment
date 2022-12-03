<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Image;

class userCon extends Controller
{
    public function index(){
        $user = User::all();
        return view('admin.user.user',compact('user'));
    }

    public function showEditPage(){
        return view('admin.user.edit_user');
    }

    public function saveEditPage(Request $request){
        //return $request->all();
        $name = $request['name'];
        $email = $request['email'];
        $old_password = $request['old_password'];
        $new_password = $request['new_password'];
        if(empty($old_password)){
            $data = User::find(Auth::user()->id)->update([
                'name'=>$name,
                'email'=>$email,
            ]);
            return back()->with('success','name and email updated successfullu');
        }else{
            if(Hash::check($old_password,Auth::user()->password)){
                //echo "milce";
                $data = User::find(Auth::user()->id)->update([
                    'name'=>$name,
                    'email'=>$email,
                    'password'=>Hash::make($new_password),
                ]);
                return back()->with('success','name,email and password updated successfullu');
            }else{
                return back()->with('error','password doesnot match');
            }
        }
    }

    public function saveUserImage(Request $request){
        //return $request->file('image');
        $file_name = $request['image'];
        $extension = $file_name->getClientOriginalExtension();
        $image_name = Auth::id().'.'.$extension;
        //echo $image_name;die;
        Image::make($file_name)->save(public_path('upload/user/'.$image_name));

        User::find(Auth::id())->update([
            'image'=>$image_name,
        ]);

        return back()->with('success','profile picture updated successfully');
    }
}
