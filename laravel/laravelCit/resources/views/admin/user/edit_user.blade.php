@extends('admin.dashboard')
@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">User</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit user</li>
    </ol>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(session('success'))
                <div class="alert alert-success">
                    <h4>{{session('success')}}</h4>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    <h4>{{session('error')}}</h4>
                </div>
            @endif

            <form  action="{{route('save_edit_user')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputUsername1">Username</label>
                    <input type="text" class="form-control" name="name"  value="{{Auth::user()->name}}"id="exampleInputUsername1"  placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}"  placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Old Password</label>
                    <input type="password" class="form-control" name="old_password" autocomplete="off" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" class="form-control" name="new_password" autocomplete="off" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>

            </form>
        </div>

        <div class="col-md-6">
            <form action="{{route('save_edit_user_image')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
