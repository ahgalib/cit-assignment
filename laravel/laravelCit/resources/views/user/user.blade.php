@extends('admin.dashboard')

@section('content')
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
                        <tr>
                            @foreach($user as $key=>$user_info)
                                <td>{{$key+1}}</td>
                                <td>{{$user_info['name']}}</td>
                                <td>{{$user_info['email']}}</td>
                                <td>Delete</td>
                                @endforeach
                        </tr>
                    </table>
            </div>
        </div>
    </div>
</div>
@endsection
