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
							<h1 class="h4 text-gray-900 mb-4">Product Create</h1>
						</div>
						<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
							@csrf  
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="pname">Product Name</label>
									<input type="text"  class="form-control @error('product_name') is-invalid @enderror" name="product_name"  id="pname" placeholder="Enter product name">
								</div>
								@error('product_name')
								<span class="text-danger">{{ $message }}</span>
								@enderror
								<div class="form-group col-md-6">
									<label for="pcode">Product Code</label>
									<input type="text" class="form-control @error('product_code') is-invalid @enderror" name="product_code" id="pcode" placeholder="Enter product code">
								</div>
								@error('product_code')
								<span class="text-danger">{{ $message }}</span>
								@enderror
								
							</div> 
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="pquan">Product Quantity</label>
									<input type="text" class="form-control @error('product_quantity') is-invalid @enderror" name="product_quantity" id="pquan" placeholder="Enter product quantity">
								</div>
								@error('product_quantity')
								<span class="text-danger">{{ $message }}</span>
								@enderror
								<div class="form-group col-md-6">
									<label for="pdisc">Product Discount</label>
									<input type="text" class="form-control @error('discount_price') is-invalid @enderror" name="discount_price" id="pdisc" placeholder="Enter product discount">
								</div>
								@error('discount_price')
								<span class="text-danger">{{ $message }}</span>
								@enderror
							</div> 
							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="category">Category</label>
									<select name="category_id"class=" form-control" id="category">
										<option selected="" dissable="">Chose Category</option>										@foreach ($categorys as $category)
										<option value="{{$category->id}}">{{$category->category_name}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group col-md-4">
									<label for="category">Sub Category</label>
									<select name="subcategory_id"class=" form-control" id="subcategory_id">
										<option selected="" dissable="">Chose Sub Category</option>
									</select>
								</div>
								<div class="form-group col-md-4">
									<label for="category">Brand</label>
									<select name="brand_id"class=" form-control">
										<option label="Chose Brand"></option>
										@foreach ($brands as $brand)
										<option value="{{$brand->id}}">{{$brand->brand_name}}</option>
										@endforeach
									</select>
								</div>
							</div> 

							<div class="form-row">

								<div class="form-group col-md-4">
									<label for="product_size">Product Size</label>
									<input type="text" name="product_size" id="product_size" class="form-control tagsinput " data-a-sign="$" data-role="tagsinput" autofocus>
								</div>
								<div class="form-group col-md-4">
									<label for="product_color">Product Color</label>
									<input type="text" name="product_color" id="product_color" class="form-control tagsinput " data-a-sign="$" data-role="tagsinput" autofocus>
								</div>
								<div class="form-group col-md-4">
									<label for="price">Selling Price</label>
									<input type="text" class="form-control @error('selling_price') is-invalid @enderror" name="selling_price" id="price" placeholder="Enter selling price">
								</div>
							</div> 

							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="pdetails">Product Details</label>
									<textarea class="form-control summernote" name="product_details">
									</textarea>	
								</div>
							</div> 
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="video_link">Video Link</label>
									<input type="text" class="form-control" name="video_link" id="video_link" placeholder="Enter video  link">
								</div>
							</div> 
							<div class="form-row">
								<div class="form-group col-md-4">
									<p>Image One (Main Thumbnail)</p>
									<div class="custom-file mb-3">

										<input type="file"   class="custom-file-input" id="one" name="image_one" onchange="readURL1(this);">
										<label class="custom-file-label" for="one">Image one upload</label>

									</div>
									<div class="text-center">
										<img  class="img-thumbnail center" id="image_one" style="border:none"> 
									</div>
								</div>
								<div class="form-group col-md-4">
									<p>Image Two (Main Thumbnail)</p>
									<div class="custom-file mb-3">

										<input type="file" class="custom-file-input" id="two" name="image_two" onchange="readURL2(this);">
										<label class="custom-file-label" for="two">Image two upload</label>
									</div>
									<div class="text-center">
										<img  class="img-thumbnail center" id="image_two" style="border:none"> 
									</div>
								</div>
								<div class="form-group col-md-4">
									<p>Image Three (Main Thumbnail)</p>
									<div class="custom-file mb-3">

										<input type="file" class="custom-file-input" id="three" name="image_three" onchange="readURL3(this);">
										<label class="custom-file-label" for="three">Image three upload</label>
									</div>
									<div class="text-center" >
										<img  class="img-thumbnail center" id="image_three" style="border:none"> 
									</div>
								</div>

							</div> 
							<hr>
							<div class="form-row">
								<div class="form-group col-md-4">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="main_slider" value="1" id="invalidCheck1" >
										<label class="form-check-label" for="invalidCheck1">Main Slider</label>
									</div>
								</div>
								<div class="form-group col-md-4">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="hot_deal" value="1" id="invalidCheck2" >
										<label class="form-check-label" for="invalidCheck2">Hot Deal</label>
									</div>
								</div>
								<div class="form-group col-md-4">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="best_raited" value="1" id="invalidCheck3" >
										<label class="form-check-label" for="invalidCheck3">Best Raited</label>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-4">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="mid_slider" value="1" id="invalidCheck4" >
										<label class="form-check-label" for="invalidCheck4">Mid Slider</label>
									</div>
								</div>
								<div class="form-group col-md-4">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="hot_new" value="1" id="invalidCheck5" >
										<label class="form-check-label" for="invalidCheck5">Hot New</label>
									</div>
								</div>
								<div class="form-group col-md-4">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="trend_product" value="1" id="invalidCheck6" >
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
					url: '/subcat/'+category,
					type: "GET",
					dataType: "json",
					success:function(data) {
					// console.log(data);
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

