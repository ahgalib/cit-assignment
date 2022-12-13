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
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Post') }}</div>
                <table class="table-striped">
                    <tr>
                        <th>SI no</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($category as $key=>$categories)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$categories['category_name']}}</td>
                            <td><img src="{{asset('upload/category')}}/{{$categories['category_image']}}" style="width:120px;"></td>
                            @can('can_edit_category')
                                <td>
                                    <button class="btn btn-info"><a href="{{route('editCategory',$categories['id'])}}">Edit</a></button>
                                    <button class="btn btn-danger delBut" data-link="{{route('deleteCategory',$categories['id'])}}"><a href="#">Delete</a></button>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <div class="col-md-4">
            <form method="post" action="{{ route('saveCategory') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" value="{{ old('category_name') }}">

                    @error('category_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">category image</label>
                    <input type="file" class="form-control @error('category_image') is-invalid @enderror" name="category_image">

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

@section('java_script')
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });


    $('.delBut').click(function(){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {


                var delPath = $(this).attr('data-link');
                //alert(delPath);
                window.location.href = delPath;

            }
        })
    })
</script>

@if(Session('success'))
<script>
    Swal.fire(
    'Deleted!',
    'Your file has been deleted.',
    'success'
    )
</script>
@endif
@endsection
