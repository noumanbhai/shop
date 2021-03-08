@extends('admin.dashbord')
{{-- Dashbord start --}}
@section('title')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Product</h1>
    <a href="{{route('product.create')}}" class="d-none d-sm-inline-block btn  btn-primary shadow-sm">Create</a>
</div>
@endsection
{{-- Dashbord start --}}
@section('main')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Product Tables</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Sub-Cat</th>
                        <th>Brand</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($products as  $product)
                    <tr>
                        <td>{{$product->product_code}}</td>
                        <td>{{$product->product_name}}</td>
                        <td><img src="{{ URL::to('/') }}/media/product/{{ $product->image_one }}" class="img-thumbnail" width="50" height="50" /></td>
                        <td>{{$product->allcats->category_name}}</td>
                        <td>{{$product->allsubcat->subcategory_name}}</td>
                        <td>@if(isset($product->allbrands->id)){{$product->allbrands->brand_name}}@endif</td>
                        <td>{{$product->product_quantity}}</td>
                        <td>{{$product->selling_price}}</td>
                        <!-- <td>{{$product->status}}</td> -->
                        <td>
                            <form action="{{ route('product.status', $product->id)}}" method="post">
                                @csrf
                                @method('POST')
                                @if($product->status == '1')



                                <a class="btn btn-sm btn-primary" href="{{ route('product.status', $product->id)}}" >Active</a>
                                <!-- <button class="btn btn-sm btn-primary" value="active">active</button> -->
                                @else

                                <a class="btn btn-sm btn-danger" href="{{ route('product.status', $product->id)}}" >Inactivated</a>


                                @endif
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('product.destroy', $product->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('product.show',$product->id)}}" class="btn btn-info">Show</a> 

                                <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary">Edit</a> 

                                <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Main Content End  -->
@endsection