@extends('admin.dashboard')
@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">User</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit user</li>
    </ol>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{route('saveEditPost')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                        <option value="">Select Category</option>
                        @foreach ($category as $category )
                            <option {{$post['category_id'] == $category['id']?'selected':''}} value="{{$category['id']}}">{{$category['category_name']}}</option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Post Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$post['title']}}" placeholder="title">

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Short Description</label>
                    <textarea name="short_desc" id="" cols="30" rows="10" class="form-control @error('short_desc') is-invalid @enderror" placeholder="short description">{{$post['short_desc']}}</textarea>

                    @error('short_desc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name="description" id="summernote" cols="30" rows="20" class="form-control @error('description') is-invalid @enderror" placeholder="description">{!! $post['description'] !!}</textarea>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Post image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mt-3">
                    <button class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection



@section('java_script')
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>

@endsection
