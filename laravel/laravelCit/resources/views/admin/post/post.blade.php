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
            <div class="card">
                <div class="card-header">{{ __('Post') }}</div>
                <table class="table-striped">
                    <tr>
                        <th>SI no</th>
                        <th>Title</th>
                        <th>Author Name</th>
                        <th>Category Name</th>
                        <th>Short Desc</th>
                        <th>Tag</th>

                        <th>Image</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($post as $key=>$posts)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{substr($posts['title'],0,20)."..."}}</td>
                            <td>{{$posts->rel_to_user['name']}}</td>
                            <td>{{$posts->rel_to_cate['category_name']}}</td>
                            <td>{{substr($posts['short_desc'],0,30)}}</td>
                            <td>
                                @php
                                    $explode = explode(',',$posts->tag_id);
                                    //print_r($explode);
                                    foreach ($explode as $value) {
                                        // echo $value."<br>";
                                        $tag =  App\Models\Tag::where('id',$value)->first();
                                        echo $tag["tag_name"]."<br>";
                                    }
                                @endphp
                            </td>
                            <td><img src="{{asset('upload/posts')}}/{{$posts['image']}}" style="width:110px;height:70px;"></td>
                            @can('can_edit_category')
                                <td>
                                    <button class="btn btn-success"><a class="text-dark" href="{{route('viewPost',$posts['id'])}}">view post</a></button>
                                    <button class="btn btn-info"><a class="text-dark" href="{{route('editpost',$posts['id'])}}">Edit</a></button>
                                    <button class="btn btn-danger delBut" data-link="{{route('deleteCategory',$posts['id'])}}"><a class="text-dark" href="#">Delete</a></button>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </table>
            </div>
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
