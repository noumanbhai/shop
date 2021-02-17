@extends('admin.dashbord')
{{-- Dashbord start --}}
@section('title')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Blog Post Category</h1>
    <a href="{{route('postcategory.create')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm">Create</a>
</div>
@endsection
{{-- Dashbord start --}}
@section('main')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Blog Post CateoryTables</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Post Category English</th>
                        <th>Post Category Urdu</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($postcategorys as $key=> $post_category)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$post_category->category_name_en}}</td>
                        <td>{{$post_category->category_name_ur}}</td>
                        <td>
<form action="{{ route('postcategory.destroy', $post_category->id)}}" method="post">
@csrf
@method('DELETE')
<a href="{{route('postcategory.edit',$post_category->id)}}" class="btn btn-primary">Edit</a> 

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