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
							<h1 class="h4 text-gray-900 mb-4">Edit Blog Post</h1>
						</div>
						<form action="{{route('postcategory.update',$postcatgory->id)}}" method="POST" >
							{{ method_field('PUT') }}
							@csrf   
							<div class="form-group">
								<label for="posten">Post Category in English</label>
								<input type="text" value="{{$postcatgory->category_name_en}}" class="form-control form-control-user @error('category_name_en') is-invalid @enderror" name="category_name_en" id="posten" placeholder="category_name_en" id="post_eng" placeholder="Enter post category english">
							</div>
							@error('category_name_en')
							<span class="text-danger">{{ $message }}</span>
							@enderror
							<div class="form-group">
								<label for="posten">Post Category in Urdu</label>
								<input type="text" value="{{$postcatgory->category_name_ur}}" class="form-control form-control-user @error('category_name_ur') is-invalid @enderror" name="category_name_ur" id="posten" placeholder="category_name_ur" id="post_eng" placeholder="Enter post category urdu">
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