@extends('admin.dashbord')
{{-- Dashbord start --}}
@section('title')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Category</h1>
<a href="{{route('category.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm">back</a>
</div>
@endsection
{{-- Dashbord start --}}
@section('main')
<!-- Main Content Start  -->
<div class="container">
<div class="card o-hidden border-0 shadow-lg my-5">
<div class="card-body p-0">
<div class="row">
<div class="col-lg-6 offset-3">
<div class="p-5">
<div class="text-center">
<h1 class="h4 text-gray-900 mb-4">Create Category</h1>
</div>
<form action="{{route('category.store')}}" method="POST" >
@csrf   
<div class="form-group">
	<label for="category">Create category</label>
<input type="text" class="form-control form-control-user @error('category_name') is-invalid @enderror" name="category_name" id="category" placeholder="Enter category">
</div>
@error('category_name')
<span class="text-danger">{{ $message }}</span>
@enderror
<div class="text-center">
<button class="btn btn-primary" type="submit">Save</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Main Content End  -->
@endsection