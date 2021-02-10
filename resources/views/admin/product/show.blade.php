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
							<h1 class="h4 text-gray-900 mb-4">Product Show</h1>
						</div>

							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="pname">Product Name</label>
<input type="text" class="form-control " value="{{$product->product_name}}" readonly="">
								</div>
								@error('product_name')
								<span class="text-danger">{{ $message }}</span>
								@enderror
								<div class="form-group col-md-4">
									<label for="pcode">Product Code</label>
									<input type="text" class="form-control @error('product_code') is-invalid @enderror" value="{{$product->product_code}}" id="pcode" placeholder="Enter product code" readonly="">
								</div>
								@error('product_code')
								<span class="text-danger">{{ $message }}</span>
								@enderror
								<div class="form-group col-md-4">
									<label for="pquan">Product Quantity</label>
									<input type="text" class="form-control @error('product_quantity') is-invalid @enderror" value="{{  $product->product_quantity}}" id="pquan" placeholder="Enter product quantity" readonly="">
								</div>
								@error('product_quantity')
								<span class="text-danger">{{ $message }}</span>
								@enderror
</div> 
<div class="form-row">
<div class="form-group col-md-4">
<label for="category">Create category</label>
@foreach($categorys as $cato)
@if($cato->id==$product->category_id)

<input type="text" class="form-control @error('product_quantity') is-invalid @enderror" value="{{  $cato->category_name}}" id="pquan" placeholder="Enter product quantity" readonly="">
@endif
@endforeach
</div>
<div class="form-group col-md-4">
<label for="subcat">Create Sub Category</label>
@foreach($subcategorys as $subcategory)
@if($product->subcategory_id==$subcategory->id)
<input type="text" class="form-control " value="{{ $subcategory->subcategory_name}}" id="subcat" readonly="">
@endif
@endforeach
</div>
<div class="form-group col-md-4">
<label for="brand">Brands</label>
@foreach($brands as $brand)
@if($product->brand_id==$brand->id)
<input type="text" class="form-control " value="{{ $brand->brand_name}}" id="brand" readonly="">
@endif
@endforeach
</div>
</div> 
					<div class="form-row">

								<div class="form-group col-md-4">
									<label for="product_size">Product Size</label>
									<input type="text" value="{{$product->product_size}}" id="product_size" class="form-control tagsinput " data-a-sign="$" data-role="tagsinput" autofocus readonly="">
								</div>
								<div class="form-group col-md-4">
									<label for="product_color">Product Color</label>
									<input type="text" value="{{$product->product_color}}" id="product_color" class="form-control tagsinput " data-a-sign="$" data-role="tagsinput" autofocus readonly="">
								</div>
								<div class="form-group col-md-4">
									<label for="price">Selling Price</label>
									<input type="text" class="form-control @error('selling_price') is-invalid @enderror" value="{{$product->selling_price}}" id="price" placeholder="Enter selling price" readonly="">
								</div>
							</div> 
							<div class="form-row">
                          <div class="form-group col-md-12">
									<label for="pdetails">Product Details</label>
					<textarea class="form-control summernote" readonly>
						{{$product->product_details}}
									</textarea readonly>	
                                 </div>
							</div> 
								<div class="form-row">
								<div class="form-group col-md-12">
									<label for="video_link">Video Link</label>
									<input type="text" class="form-control" value="{{$product->video_link}}" id="video_link" placeholder="Enter video  link" readonly="">
								</div>
							</div> 
														<div class="form-row">
								<div class="form-group col-md-4">
									<p>Image One (Main Thumbnail)</p>
                                    <div class="text-center">
									<img src="{{ URL::to('/') }}/media/product/{{ $product->image_one }}" class="img-thumbnail" width="80" height="80" />
									</div>
								</div>
								<div class="form-group col-md-4">
									<p>Image Two (Main Thumbnail)</p>
                                    <div class="text-center">
									<img src="{{ URL::to('/') }}/media/product/{{ $product->image_two }}" class="img-thumbnail" width="80" height="80" />
									</div>
								</div>
								<div class="form-group col-md-4">
									<p>Image Three (Main Thumbnail)</p>
	                                    <div class="text-center">
									<img src="{{ URL::to('/') }}/media/product/{{ $product->image_three}}" class="img-thumbnail" width="80" height="80" />
									</div>
								</div>

							</div> 
<hr>
<div class="form-row">
<div class="form-group col-md-4">
<div class="form-check">

<input name="main_slider" type="checkbox" id="invalidCheck1" class="form-check-input"  {{ ($product->main_slider == 1) ? 'checked' : '' }}>



<label class="form-check-label" for="invalidCheck1">Main Slider</label>
</div>
</div>
<div class="form-group col-md-4">
<div class="form-check">
<input name="main_sliderhot_deal" type="checkbox" id="invalidCheck2" class="form-check-input"  {{ ($product->hot_deal == 1) ? 'checked' : '' }}>
<label class="form-check-label" for="invalidCheck2">Hot Deal</label>
</div>
</div>
<div class="form-group col-md-4">
<div class="form-check">
<input name="best_rated" type="checkbox" id="invalidCheck3" class="form-check-input"  {{ ($product->best_rated == 1) ? 'checked' : '' }}>
<label class="form-check-label" for="invalidCheck3">Best Raited</label>
</div>
</div>
</div>
<div class="form-row">
<div class="form-group col-md-4">
<div class="form-check">
<input name="mid_slider" type="checkbox" id="invalidCheck4" class="form-check-input"  {{ ($product->mid_slider == 1) ? 'checked' : '' }}>
<label class="form-check-label" for="invalidCheck4">Mid Slider</label>
</div>
</div>
<div class="form-group col-md-4">
<div class="form-check">
<input name="hot_new" type="checkbox" id="invalidCheck5" class="form-check-input"  {{ ($product->hot_new == 1) ? 'checked' : '' }}>
<label class="form-check-label" for="invalidCheck5">Hot New</label>
</div>
</div>
<div class="form-group col-md-4">
<div class="form-check">
<input name="trend" type="checkbox" id="invalidCheck6" class="form-check-input"  {{ ($product->trend == 1) ? 'checked' : '' }}>
<label class="form-check-label" for="invalidCheck6">Trend Product</label>
</div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<!-- <script type="text/javascript">

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

 -->