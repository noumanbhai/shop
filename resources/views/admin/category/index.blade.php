@extends('admin.dashbord')
{{-- Dashbord start --}}
@section('title')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Category</h1>
    <a href="{{route('category.create')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm">Create</a>
    </div>
    @endsection
    {{-- Dashbord start --}}
    @section('main')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Category Table</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach ($categorys as $key=> $category)
                    <tbody>
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$category->category_name}}</td>
                            <td><button class="btn btn-primary">Active</button></td>
                        </tr>
                    </tbody>
                     @endforeach

                </table>
            </div>
        </div>
    </div>
    <!-- Main Content End  -->
    @endsection