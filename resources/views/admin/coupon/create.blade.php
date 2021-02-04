@extends('admin.dashbord')
{{-- Dashbord start --}}
@section('title')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Coupon</h1>
<a href="{{route('coupon.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm">back</a>
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
<h1 class="h4 text-gray-900 mb-4">Coupon Create</h1>
</div>
<form action="{{route('coupon.store')}}" method="POST" >
@csrf   
<div class="form-group">
	<label for="category">Create Coupon Code</label>
<input type="text" class="form-control form-control-user @error('coupon') is-invalid @enderror" name="coupon" id="category" placeholder="Enter Coupon">
</div>
@error('coupon')
<span class="text-danger">{{ $message }}</span>
@enderror
<div class="form-group">
	<label for="discount">Create Coupon Discount (%)</label>
<input type="text" class="form-control form-control-user @error('discount') is-invalid @enderror" name="discount" id="discount" placeholder="Enter discount">
</div>
@error('discount')
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


