@extends('admin.dashbord')
{{-- Dashbord start --}}
@section('title')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Blog Post Category</h1>
	<a href="{{route('postcategory.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm">back</a>
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
							<h1 class="h4 text-gray-900 mb-4">Create Blog Post Category</h1>
						</div>
						<form action="{{route('postcategory.store')}}" method="POST" >
							@csrf   
							<div class="form-group">
								<label for="post_eng">Post Category in English</label>
								<input type="text" class="form-control form-control-user @error('category_name_en') is-invalid @enderror" name="category_name_en" id="post_eng" placeholder="Enter post category english">
							</div>
							@error('category_name_en')
							<span class="text-danger">{{ $message }}</span>
							@enderror
							<div class="form-group">
								<label for="post_urdu">Post Category in Urdu</label>
								<input type="text" class="form-control form-control-user @error('category_name_ur') is-invalid @enderror" name="category_name_ur" id="post_urdu" placeholder="Enter post category urdu">
							</div>
							@error('category_name_ur')
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