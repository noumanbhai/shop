<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>


	
	

<form action="{{route('$1.update',$2->id)}}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PUT') }}

<div class="form-group">
<label for="brand ">Brand name</label>
<input type="text" value="{{->brand_name}}" class="form-control form-control-user @error('brand_name') is-invalid @enderror" name="brand_name" id="brand " placeholder="Enter brand name ">
</div>
@error('brand_name')
<span class="text-danger">{{  }}</span>
@enderror
{{-- <div class="form-group">
<label for="brand">Brand logo</label>
<input type="file" name="logo" class="form-control form-control-user @error('brand_logo') is-invalid @enderror"  id="brand" placeholder="Enter brand logo">
</div>
@error('brand_logo')
<span class="text-danger">{{  }}</span>
@enderror
<div class="form-group">
<label for="brand">Brand old logo</label>
<input type="hidden" name="old_image" value="{{->brand_logo}}">

<img src="{{ URL::to('/') }}/images/{{ ->brand_logo }}" class="img-thumbnail" width="70" height="70" />
</div> --}}
<div class="form-group">
<input type="hidden" name="id" value="{{->id}}">

<div class="form-group">
<label for="brand">Brand Image</label>
<input type="file" id="brand" class="form-control"  name="brand_image"  placeholder="Enter Brand name">
</div>
<!-- old image -->
<div class="form-group">
<label for="brand">Old Image</label>
<input type="hidden" name="old_image" value="{{->brand_image}}">

<img src="{{ URL::to('/') }}/images/{{ ->brand_image }}" class="img-thumbnail" width="70" height="70" />

</div>

<div class="text-center">
<button class="btn btn-primary" type="submit">Save</button>
</div>
</form>

...................
	
	
	<form action="{{route('$1.update',{$1}->id)}}" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	
	<div class="form-group">
	<label for="brand ">Brand name</label>
	<input type="text" value="{{->brand_name}}" class="form-control form-control-user @error('brand_name') is-invalid @enderror" name="brand_name" id="brand " placeholder="Enter brand name ">
	</div>
	@error('brand_name')
	<span class="text-danger">{{  }}</span>
	@enderror
	{{-- <div class="form-group">
	<label for="brand">Brand logo</label>
	<input type="file" name="logo" class="form-control form-control-user @error('brand_logo') is-invalid @enderror"  id="brand" placeholder="Enter brand logo">
	</div>
	@error('brand_logo')
	<span class="text-danger">{{  }}</span>
	@enderror
	<div class="form-group">
	<label for="brand">Brand old logo</label>
	<input type="hidden" name="old_image" value="{{->brand_logo}}">
	
	<img src="{{ URL::to('/') }}/images/{{ ->brand_logo }}" class="img-thumbnail" width="70" height="70" />
	</div> --}}
	<div class="form-group">
	<input type="hidden" name="id" value="{{->id}}">
	
			<div class="form-group">
				<label for="brand">Brand Image</label>
				<input type="file" id="brand" class="form-control"  name="brand_image"  placeholder="Enter Brand name">
			</div>
			<!-- old image -->
			 <div class="form-group">
				<label for="brand">Old Image</label>
				<input type="hidden" name="old_image" value="{{->brand_image}}">
	
			<img src="{{ URL::to('/') }}/images/{{ ->brand_image }}" class="img-thumbnail" width="70" height="70" />
			
			</div>
	
	<div class="text-center">
	<button class="btn btn-primary" type="submit">Save</button>
	</div>
	</form>
	
	


...

<form action="{{route('brand.update',brand->id)}}" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	
	<div class="form-group">
	<label for="brand ">Brand name</label>
	<input type="text" value="{{->brand_name}}" class="form-control form-control-user @error('brand_name') is-invalid @enderror" name="brand_name" id="brand " placeholder="Enter brand name ">
	</div>
	@error('brand_name')
	<span class="text-danger">{{  }}</span>
	@enderror
	{{-- <div class="form-group">
	<label for="brand">Brand logo</label>
	<input type="file" name="logo" class="form-control form-control-user @error('brand_logo') is-invalid @enderror"  id="brand" placeholder="Enter brand logo">
	</div>
	@error('brand_logo')
	<span class="text-danger">{{  }}</span>
	@enderror
	<div class="form-group">
	<label for="brand">Brand old logo</label>
	<input type="hidden" name="old_image" value="{{->brand_logo}}">
	
	<img src="{{ URL::to('/') }}/images/{{ ->brand_logo }}" class="img-thumbnail" width="70" height="70" />
	</div> --}}
	<div class="form-group">
	<input type="hidden" name="id" value="{{->id}}">
	
			<div class="form-group">
				<label for="brand">Brand Image</label>
				<input type="file" id="brand" class="form-control"  name="brand_image"  placeholder="Enter Brand name">
			</div>
			<!-- old image -->
			 <div class="form-group">
				<label for="brand">Old Image</label>
				<input type="hidden" name="old_image" value="{{->brand_image}}">
	
			<img src="{{ URL::to('/') }}/images/{{ ->brand_image }}" class="img-thumbnail" width="70" height="70" />
			
			</div>
	
	<div class="text-center">
	<button class="btn btn-primary" type="submit">Save</button>
	</div>
	</form>
	
	
...














<div class="container">
<form action="{{route('.update',->id)}}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PUT') }}
<div class="form-row">
<div class="form-group col-md-6">
<label for="">name</label>
<input type="text" value="{{->}}"  class="form-control @error('') is-invalid @enderror" name=""  id="" placeholder="Enter text">
</div>
@error('')
<span class="text-danger">{{ $message }}</span>
@enderror
{{-- copy paste --}}
<div class="form-group col-md-6">
<label for="inputPassword4">Password</label>
<input type="password" class="form-control" id="inputPassword4" placeholder="Password">
</div>
{{-- end --}}
</div>
<div class="col text-center">
<button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
</div>
</div>








		

	







	


































		


										
















	
	

	


	






	
	
</body>
</html>