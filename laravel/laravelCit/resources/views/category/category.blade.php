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
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    @if($category = 0)
                        @foreach ($category as $categories)
                            <tr>
                                <td></td>
                            </tr>
                        @endforeach
                    @else
                    <tr>
                        <p style="color:orange;">No category found</p>
                    </tr>

                    @endif

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
                    <input type="file" class="form-control @error('category_image') is-invalid @enderror" name="category_image" value="{{ old('category_image') }}">

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