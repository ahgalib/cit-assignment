@extends('admin.dashboard')
@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Post</a></li>
        <li class="breadcrumb-item active" aria-current="page">View Post</li>
    </ol>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div>
                    <img src="{{asset('upload/posts')}}/{{$post->image}}" style="width:260px;height:200px;" alt="">
                </div>
                <div class="card-header">{{ __('Full Post') }}</div>
                <h3>{{$post->short_desc}}</h3>
                <h5 class="text-center my-3">{{$post->title}}</h5>
                <p>{!! $post->description !!}</p>
            </div>
        </div>


    </div>
</div>
@endsection


