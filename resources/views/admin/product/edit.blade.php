@extends('admin.dashbord')

{{-- Dashbord start --}}
@section('title')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Product</h1>
	<a href="{{route('product.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm">back</a>
</div>
@endsection
{{-- Dashbord start --}}
@section('main')
<!-- Main Content Start  -->
<div class="container">
	<div class="card o-hidden border-0 shadow-lg my-5">
		<div class="card-body p-0">
			<div class="row">
				<div class="col-lg-12">
					<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4">Product Update</h1>
						</div>
						<form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
							{{ csrf_field() }}
							{{ method_field('PUT') }}





							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="pname">Product Name</label>
									<input type="text"  class="form-control" value="{{$product->product_name  }}" name="product_name"  id="pname" >
								</div>
								@error('product_name')
								<span class="text-danger">{{ $message }}</span>
								@enderror
								<div class="form-group col-md-4">
									<label for="pcode">Product Code</label>
									<input type="text" class="form-control @error('product_code') is-invalid @enderror" value="{{$product->product_code  }}"name="product_code" id="pcode" placeholder="Enter product code">
								</div>
								@error('product_code')
								<span class="text-danger">{{ $message }}</span>
								@enderror
								<div class="form-group col-md-4">
									<label for="pquan">Product Quantity</label>
									<input type="text" class="form-control @error('product_quantity') is-invalid @enderror" value="{{$product ->product_quantity }}"name="product_quantity" id="pquan" placeholder="Enter product quantity">
								</div>
								@error('product_quantity')
								<span class="text-danger">{{ $message }}</span>
								@enderror
							</div> 
							<div class="form-row">
								<?php
								$cat_id = null;
								?>
								<div class="form-group col-md-4">
									<label for="category">Category</label>
									<select name="category_id"class=" form-control" id="category">
										<option selected="" dissable="">Chose Category</option>
										@foreach ($categorys as $category)
										<?php if($product->category_id == $category->id){
											$cat_id = $category->id;
										} ?>
										<option value="{{$category->id}}" 
											{{$product->category_id == $category->id ? "selected" : ""}}>{{$category->category_name}}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group col-md-4">
										<label for="category">Sub Category</label>
										<select name="subcategory_id"class=" form-control" id="subcategory_id">
											<option selected="">Choose Sub Category</option>
											@foreach($subcategorys as $subcategory)
											{{$subcategory->id}}
											@if($cat_id == $subcategory->category_id)
											<option value="{{$subcategory->id}}" 
												{{$product->subcategory_id == $subcategory->id ? "selected" : ""}}>{{$subcategory->subcategory_name}}</option>
												@endif
												@endforeach
											</select>
										</div>

<!-- <div class="form-group col-md-4">
<label for="category">Sub Category</label>
<select name="subcategory_id"class=" form-control" id="subcategory_id">
<option selected="" dissable="">Chose Sub Category</option>
</select>
</div> -->


<div class="form-group col-md-4">
	<label for="brands">Brands</label>
	<select name="brand_id"class=" form-control" id="brands">
		<option selected="" dissable="">Chose Brands</option>
		@foreach ($brands as $brand)
		<option value="{{$brand->id}}" 
			{{$product->brand_id == $brand->id ? "selected" : ""}}>{{$brand->brand_name}}</option>
			@endforeach
		</select>
	</div>
</div>


<div class="form-row">

	<div class="form-group col-md-4">
		<label for="product_size">Product Size</label>
		<input type="text" value="{{$product ->product_size}}" name="product_size" id="product_size" class="form-control tagsinput " data-a-sign="$" data-role="tagsinput" autofocus>
	</div>
	<div class="form-group col-md-4">
		<label for="product_color">Product Color</label>
		<input type="text" value="{{$product ->product_color}}" name="product_color" id="product_color" class="form-control tagsinput " data-a-sign="$" data-role="tagsinput" autofocus>
	</div>
	<div class="form-group col-md-4">
		<label for="price">Selling Price</label>
		<input type="text" class="form-control @error('selling_price') is-invalid @enderror" value="{{$product ->selling_price}}" name="selling_price" id="price" placeholder="Enter selling price">
	</div>
</div> 
<div class="form-row">
	<div class="form-group col-md-12">
		<label for="pdetails">Product Details</label>
		<textarea class="form-control summernote" name="product_details">
			{{ $product->product_details }}
		</textarea>	
	</div>
</div> 
<div class="form-row">
	<div class="form-group col-md-12">
		<label for="video_link">Video Link</label>
		<input type="text" class="form-control" value="{{$product->video_link}}" name="video_link" id="video_link" placeholder="Enter video  link">
	</div>
</div> 
<!-- images start-->
<div class="form-row">
	<div class="form-group col-md-4">
		<p>Image One (Main Thumbnail)</p>
		<div class="custom-file mb-3">
			<input type="file"   class="custom-file-input" id="one" name="image_one_new" onchange="readURL1(this);">
			<label class="custom-file-label" for="one">Image one upload</label>

		</div>
		<div class="text-center">
			<input type="hidden" name="old_image_one" value="{{$product->image_one}}">
			<img src="{{ URL::to('/') }}/media/product/{{ $product->image_one }}" class="img-thumbnail" width="81" height="81" id="image_one" />
		</div>
	</div>
	<div class="form-group col-md-4">
		<p>Image Two (Main Thumbnail)</p>
		<div class="custom-file mb-3">
			<input type="file"   class="custom-file-input" id="two" name="image_two_new" onchange="readURL2(this);">
			<label class="custom-file-label" for="two">Image two upload</label>

		</div>
		<div class="text-center">
			<input type="hidden" name="old_image_two" value="{{$product->image_two}}">
			<img src="{{ URL::to('/') }}/media/product/{{ $product->image_two }}" class="img-thumbnail" width="81" height="81" id="image_two" />
		</div>
	</div>
	<div class="form-group col-md-4">
		<p>Image Three (Main Thumbnail)</p>
		<div class="custom-file mb-3">
			<input type="file"   class="custom-file-input" id="three" name="image_three_new" onchange="readURL3(this);">
			<label class="custom-file-label" for="three">Image three upload</label>

		</div>
		<div class="text-center">
			<input type="hidden" name="old_image_three" value="{{$product->image_three}}">
			<img src="{{ URL::to('/') }}/media/product/{{ $product->image_three }}" class="img-thumbnail" width="81" height="81" id="image_three" />
		</div>
	</div>
</div> 
<!-- images start-->

<hr>
<div class="form-row">
	<div class="form-group col-md-4">
		<div class="form-check">
			<input type="checkbox" name="main_slider" id="invalidCheck1" value="1" {{($product->main_slider == 1 ? ' checked' : '') }}
			<label class="form-check-label" for="invalidCheck1">Main Slider</label>
		</div>
	</div>
	<div class="form-group col-md-4">
		<div class="form-check">
			<input type="checkbox" name="hot_deal" id="invalidCheck2" value="1" {{  ($product->hot_deal == 1 ? ' checked' : '') }}
			<label class="form-check-label" for="invalidCheck2">Hot Deal</label>
		</div>
	</div>
	<div class="form-group col-md-4">
		<div class="form-check">
			<input type="checkbox" name="best_rated" id="invalidCheck3" value="1" {{  ($product->best_rated == 1 ? ' checked' : '') }}
			<label class="form-check-label" for="invalidCheck3">Best Raited</label>
		</div>
	</div>
</div>
<div class="form-row">
	<div class="form-group col-md-4">
		<div class="form-check">
			<input type="checkbox" name="mid_slider" id="invalidCheck4" value="1" {{  ($product->mid_slider == 1 ? ' checked' : '') }}
			<label class="form-check-label" for="invalidCheck4">Mid Slider</label>
		</div>
	</div>
	<div class="form-group col-md-4">
		<div class="form-check">
			<input type="checkbox" name="hot_new" id="invalidCheck5" value="1" {{  ($product->hot_new == 1 ? ' checked' : '') }}
			<label class="form-check-label" for="invalidCheck5">Hot New</label>
		</div>
	</div>
	<div class="form-group col-md-4">
		<div class="form-check">
			<input type="checkbox" name="trend" id="invalidCheck6" value="1" {{  ($product->trend == 1 ? ' checked' : '') }}
			<label class="form-check-label" for="invalidCheck6">Trend Product</label>
		</div>
	</div>
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

<!-- Main Content End  -->
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script type="text/javascript">

	$(document).ready(function() {
		$('#category').on('change', function(){
			let category = $('#category').val();
			if (category ) {
				$.ajax({
					url: '/subcatajax/'+category,
					type: "GET",
					dataType: "json",
					success:function(data) {
						console.log(data);
						$('#subcategory_id').empty();
						$.each(data,function(key,value) {
							$('#subcategory_id').append('<option value="'+value.id+'">'+value.subcategory_name+'</option>');
						});
					}  
				});	
			}
			else{
				alert('danger');
			}
		})
	});

</script>

<script>
	function readURL1(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#image_one')
				.attr('src', e.target.result)
				.width(81)
				.height(81);
			};


			reader.readAsDataURL(input.files[0]);
		}
	}

</script>
<script>
	function readURL2(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#image_two')
				.attr('src', e.target.result)
				.width(81)
				.height(81);
			};


			reader.readAsDataURL(input.files[0]);
		}
	}

</script>
<script>
	function readURL3(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#image_three')
				.attr('src', e.target.result)
				.width(81)
				.height(81);
			};


			reader.readAsDataURL(input.files[0]);
		}
	}

</script>

