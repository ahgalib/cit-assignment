@extends('admin.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <table class="table-striped">
                    <tr>
                        <th>SI no</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($tag as $key=>$tags)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$tags['tag_name']}}</td>
                            <td>
                                <button class="btn btn-danger delBut" data-link="{{route('deleteTag',$tags['id'])}}"><a href="#">Delete</a></button>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>

        <div class="col-md-4">
            <form method="post" action="{{ route('saveTag') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Tag Name</label>
                    <input type="text" class="form-control @error('tag_name') is-invalid @enderror" name="tag_name" value="{{ old('tag_name') }}">

                    @error('tag_name')
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
