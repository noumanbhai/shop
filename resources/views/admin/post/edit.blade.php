@extends('admin.dashbord')

{{-- Dashbord start --}}
@section('title')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Blog Edit Post</h1>
	<a href="{{route('post.index')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm">back</a>
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
							<h1 class="h4 text-gray-900 mb-4">Blog Post Edit</h1>
						</div>
						<form action="{{route('post.update',$post->id)}}" method="POST" enctype="multipart/form-data">

							{{ csrf_field() }}
							{{ method_field('PUT') }}
							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="post_en">Post Title(English)</label>
									<input type="text"  class="form-control @error('post_title_en') is-invalid @enderror" value="{{$post->post_title_en  }}" name="post_title_en"   id="post_en" >
								</div>
								@error('post_title_en')
								<span class="text-danger">{{ $message }}</span>
								@enderror
								<div class="form-group col-md-4">
									<label for="post_ur">Post Title(Urdu)</label>
									<input type="text" class="form-control @error('post_title_ur') is-invalid @enderror" value="{{$post->post_title_ur}}" name="post_title_ur" id="post_ur" placeholder="Enter post title in english">
								</div>
								@error('post_title_ur')
								<span class="text-danger">{{ $message }}</span>
								@enderror


								<div class="form-group col-md-4">
									<label for="category"> Blog Post Category </label>
									<select name="category_id"class=" form-control" id="category">
										<option selected="" dissable="">Chose Blog Post</option>
										@foreach ($postcats as $postcat)
										<?php if($post->category_id == $postcat->id){
											$cat_id = $postcat->id;
										} ?>
										<option value="{{$postcat->id}}" 
											{{$post->category_id == $postcat->id ? "selected" : ""}}>{{$postcat->category_name_en}}</option>
											@endforeach
										</select>
									</div>



								</div> 
								
								

								

								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="pdetailsen">Blog Post Details(English)</label>
										<textarea class="form-control summernote" name="details_en" >
											{!! $post->details_en !!}
										</textarea>	
									</div>
								</div> 
								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="pdetailsur">Blog Post Details(Urdu)</label>
										<textarea class="form-control summernote" name="details_ur">
											{!! $post->details_ur !!}

										</textarea>	
									</div>
								</div> 

								<div class="form-row">
									<div class="form-group col-md-4">
										<p>Blog Post Imeage</p>
										<div class="custom-file mb-3">
											<input type="file"   class="custom-file-input" id="one" 
											name="image_one_new" onchange="readURL1(this);">
											<label class="custom-file-label" for="one">Image one upload</label>

										</div>


										<div class="text-center">
											<input type="hidden" name="old_image_one" value="{{$post->post_image}}">
											<img src="{{ URL::to('/') }}/media/post/{{ $post->post_image }}" class="img-thumbnail" width="81" height="81" id="image_one" />
										</div>
									</div>



								</div> 
								<hr>

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

