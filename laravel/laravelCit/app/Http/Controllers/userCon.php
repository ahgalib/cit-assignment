<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class userCon extends Controller
{
    public function index(){
        $user = User::all();
        return view('user.user',compact('user'));
    }
}
