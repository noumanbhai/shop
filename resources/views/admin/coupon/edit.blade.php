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
							<h1 class="h4 text-gray-900 mb-4">Edit Coupon</h1>
						</div>

						<div class="container">
							<form action="{{route('coupon.update',$coupon->id)}}" method="POST" >
								{{ csrf_field() }}
								{{ method_field('PUT') }}
								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="catname">Create Coupon Code</label>
										<input type="text" value="{{$coupon->coupon}}"  class="form-control @error('coupon') is-invalid @enderror" name="coupon"  id="catname" placeholder="Enter coupon code">
									</div>
									@error('coupon')
									<span class="text-danger">{{ $message }}</span>
									@enderror

									<div class="form-group col-md-12">
										<label for="discount">Create Coupon Discount(%)</label>
										<input type="text" value="{{$coupon->discount}}"  class="form-control @error('discount') is-invalid @enderror" name="discount"  id="discount" placeholder="Enter coupon discount">
									</div>
									@error('subcategory_name')
									<span class="text-danger">{{ $message }}</span>
									@enderror

								</div>
								<div class="col text-center">
									<button type="submit" class="btn btn-primary">Save</button>
								</div>
							</form>
						</div>
					</div>



				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- Main Content End  -->
@endsection


