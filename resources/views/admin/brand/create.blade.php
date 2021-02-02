@extends('admin.dashbord')
{{-- Dashbord start --}}
@section('title')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Brand</h1>
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
<h1 class="h4 text-gray-900 mb-4">Create Brand</h1>
</div>
<form action="{{route('brand.store')}}" method="POST" enctype="multipart/form-data">
	
@csrf    
<div class="form-group">
	<label for="brand">Brand Name</label>
<input type="text" class="form-control form-control-user @error('brand_name') is-invalid @enderror" name="brand_name" id="brand" placeholder="Enter brand name">
</div>
@error('brand_name')
<span class="text-danger">{{ $message }}</span>
@enderror
<div class="form-group">
	<label for="brand">Brand Logo</label>
<input type="file" class="form-control form-control-user @error('brand_image') is-invalid @enderror" name="brand_image" id="brand" placeholder="Enter brand logo">
</div>
@error('brand_image')
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