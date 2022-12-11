@extends('admin.dashboard')
@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">User</a></li>
        <li class="breadcrumb-item active" aria-current="page">Role</li>
    </ol>
</nav>

<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <div class="card flex-wrap">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body ">

                    <table class="table-striped" style="font-size:15px;">
                        <tr>
                            <th>SI no</th>
                            <th>Name</th>
                            <th>Permission</th>
                            <th>Action</th>
                        </tr>
                        @foreach($role as $si=>$roles)
                        <tr>
                            <td>{{$si+1}}</td>
                            <td>{{$roles->name}}</td>
                            <td>
                                @foreach ($roles->getAllPermissions() as $permissions)
                                    <span class="badge badge-success" style="font-size:14px; margin:3px;">
                                        {{$permissions->name}}
                                    </span>

                                @endforeach
                            </td>

                            <td></td>
                        </tr>
                        @endforeach
                     </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body ">

                    <table class="table-striped" style="font-size:15px;text-align:center;">
                        <tr>
                            <th>SI no</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Permission</th>
                            <th>Action</th>
                        </tr>
                        @foreach($user as $si=>$users)
                        <tr>
                            <td>{{$si+1}}</td>
                            <td>{{$users->name}}</td>
                            <td>
                                @foreach ($users->getRoleNames() as $assingrole)
                                    <span class="badge badge-info" style="font-size:13px; margin:3px;">
                                        {{$assingrole}}
                                    </span>

                                @endforeach

                            </td>
                            <td>
                                @foreach ($users->getAllPermissions() as $permissions)
                                    <span class="badge badge-warning" style="font-size:13px; margin:3px;">
                                        {{$permissions->name}}
                                    </span>

                                @endforeach
                            </td>
                            <td></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <form action="{{route('savePermission')}}" method="post">
                <h4>Add Permission</h4>
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Permission</label>
                    <input type="text" class="form-control" name="permission_name" placeholder="add permission">
                </div>
                <div class="mt-3 mb-5">
                    <button class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">Add Permission</button>
                </div>

            </form>

            <form action="{{route('saveRole')}}" method="post" class="mt-3">
                @csrf
                <h4>Add Role</h4>
                <div class="mb-3">
                    <label for="exampleInputEmail1">Role name</label>
                    <input type="text" class="form-control" name="role_name" placeholder="add role">
                </div>


                <h4>Permission</h4>
                @foreach ($permission as $per)
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="permission[]" value="{{$per['id']}}">{{$per['name']}}

                                <i class="input-frame"></i>
                            </label>
                        </div>
                    </div>
                @endforeach
                <div class="mb-5">
                    <button class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">Add Role</button>
                </div>
            </form>

            <form action="{{route('saveAssignRole')}}" method="post" class="mt-3">
                @csrf
                <h4>Assign Role</h4>
                <div class="mb-3">
                    <select name="user_id" class="form-control search-select">
                        <option value="">Select User</option>
                        @foreach ($user as $users )
                            <option value="{{$users['id']}}">{{$users['name']}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <select name="role_id" class="form-control search-select">
                        <option value="">Select Role</option>
                        @foreach ($role as $roles )
                            <option value="{{$roles['id']}}">{{$roles['name']}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <button class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">Add Role</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('java_script')
<script>
    $(document).ready(function() {
    $('.search-select').select2();
});
</script>
@endsection
