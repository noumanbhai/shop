@extends('admin.dashbord')
{{-- Dashbord start --}}
@section('title')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Brand</h1>
    <a href="{{route('brand.create')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm">Create</a>
</div>
@endsection
{{-- Dashbord start --}}
@section('main')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Brand Tables</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Brand Name</th>
                        <th>Brand Logo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $key=> $brand)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$brand->brand_name}}</td>
            <td><img src="{{ URL::to('/') }}/images/{{ $brand->brand_image }}" class="img-thumbnail" width="50" height="50" /></td>
                        <td>
<form action="{{ route('brand.destroy', $brand->id)}}" method="post">
@csrf
@method('DELETE')
<a href="{{route('brand.edit',$brand->id)}}" class="btn btn-primary">Edit</a> 

<button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit">Delete</button>
</form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Main Content End  -->
@endsection