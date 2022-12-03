@extends('admin.dashboard')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-4">
            <form method="post" action="{{ route('saveEditCategory',$category['id']) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" value="{{$category->category_name}}">

                    @error('category_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">category image</label>
                    <input type="file" class="form-control @error('category_image') is-invalid @enderror" name="category_image">
                    <img src="{{asset('upload/category')}}/{{$category['category_image']}}" alt="">
                    @error('category_image')
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


