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
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                    <table class="table-striped">
                        <tr>
                            <th>SI no</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        @foreach($user as $key=>$user_info)
                        <tr>

                                <td>{{$key+1}}</td>
                                <td>{{$user_info['name']}}</td>
                                <td>{{$user_info['email']}}</td>
                                <td>Delete</td>

                        </tr>
                        @endforeach
                    </table>
            </div>
        </div>
    </div>
</div>
@endsection
