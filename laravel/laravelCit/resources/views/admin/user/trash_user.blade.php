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
        <div class="col-md-8">
            <button type="submit" class="btn btn-danger" id="deleteMultiple">Delete Multiple</button>
           <form action="{{route('userCheckDelete')}}" method="post">
            @csrf
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-danger checkSelAll">Delete Checked</button>
                    </div>

                    <table class="table table-striped">
                        <tr>
                            <th class="checkSelAll"><input type="checkbox" id="checkAll" class="checkSelAll">
                                Check All
                            </th>
                            <th>SI no</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Restore</th>
                            <th class="delSingle">Action</th>

                        </tr>
                        @foreach($user as $key=>$user_info)
                        <tr>

                            <td class="checkSelAll">
                                <input type="checkbox" name="check[]" value="{{$user_info['id']}}"
                                class="checkSelAll">
                            </td>
                            <td>{{$key+1}}</td>
                            <td>{{$user_info['name']}}</td>
                            <td>{{$user_info['email']}}</td>
                            <td>
                                <a href="/userRestore/{{$user_info['id']}}" class="btn btn-success">Restore</a>
                            </td>
                            <td>
                                <a href="/userHardDelete/{{$user_info['id']}}"
                                class="btn btn-danger delSingle">Delete</a>
                            </td>

                        </tr>
                        @endforeach
                    </table>
                </div>
           </form>
        </div>
    </div>
</div>
@endsection

@section('java_script')
<script>
 $("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});

$(".checkSelAll").hide();
$("#deleteMultiple").click(function(){
    $(".checkSelAll").show();
    $(".delSingle").hide();
})
</script>
@endsection
