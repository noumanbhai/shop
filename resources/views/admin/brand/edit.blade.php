@extends('admin.dashbord')
{{-- Dashbord start --}}
@section('title')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Brand</h1>
<a href="{{route('brand.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm">back</a>
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
<h1 class="h4 text-gray-900 mb-4">Edit Brand</h1>
</div>
<form action="{{route('brand.update',$brand->id)}}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PUT') }}

<div class="form-group">
<label for="brand ">Brand name</label>
<input type="text" value="{{$brand->brand_name}}" class="form-control form-control-user @error('brand_name') is-invalid @enderror" name="brand_name" id="brand " placeholder="Enter brand name ">
</div>
@error('brand_name')
<span class="text-danger">{{ $message }}</span>
@enderror
{{-- <div class="form-group">
<label for="brand">Brand logo</label>
<input type="file" name="logo" class="form-control form-control-user @error('brand_logo') is-invalid @enderror"  id="brand" placeholder="Enter brand logo">
</div>
@error('brand_logo')
<span class="text-danger">{{ $message }}</span>
@enderror
<div class="form-group">
<label for="brand">Brand old logo</label>
<input type="hidden" name="old_image" value="{{$brand->brand_logo}}">

<img src="{{ URL::to('/') }}/images/{{ $brand->brand_logo }}" class="img-thumbnail" width="70" height="70" />
</div> --}}
<div class="form-group">
<input type="hidden" name="id" value="{{$brand->id}}">

						<div class="form-group">
							<label for="brand">Brand Image</label>
							<input type="file" id="brand" class="form-control"  name="brand_image"  placeholder="Enter Brand name">
						</div>
						<!-- old image -->
						 <div class="form-group">
							<label for="brand">Old Image</label>
							<input type="hidden" name="old_image" value="{{$brand->brand_image}}">

						<img src="{{ URL::to('/') }}/images/{{ $brand->brand_image }}" class="img-thumbnail" width="70" height="70" />
						
						</div>

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