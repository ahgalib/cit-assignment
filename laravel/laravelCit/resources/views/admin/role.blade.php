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
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">


                    <table class="table-striped">
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
                                    <span class="badge badge-primary">{{$permissions->name}}</span>

                                @endforeach
                            </td>
                            <td></td>
                        </tr>
                        @endforeach


                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <form action="{{route('savePermission')}}" method="post">
                <h4>Add Permission</h4>
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Permission</label>
                    <input type="text" class="form-control" name="permission_name">
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
                    <input type="text" class="form-control" name="role_name" >
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
        </div>
    </div>
</div>
@endsection

