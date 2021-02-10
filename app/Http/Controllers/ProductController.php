<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcat;
use App\Models\Brand;
use Illuminate\Http\Request;
use DB;
use File;
use Carbon;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys=Category::all();
        $subcategorys=Subcat::all();
        $brands=Brand::all();
        return view('admin.product.create',compact('categorys','subcategorys','brands'));
    }

    /**
     * Store a newly created resource in storage.create
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         //dd($request->all());
        // return $image= $request->file('image_one');
        $image_one=$request->image_one;
        $image_two=$request->image_two;
        $image_three=$request->image_three;

        if ($image_one && $image_two && $image_three) {

            $image_one_name=hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(300,300)->save(public_path('/media/product/'.$image_one_name));
            $oneimage = $image_one_name;

            $image_two_name=hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(300,300)->save(public_path('/media/product/'.$image_two_name));
            $twoimage = $image_two_name;

            $image_three_name=hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(300,300)->save(public_path('/media/product/'.$image_three_name));
            $threeimage = $image_three_name;

            $product= new Product([
                'product_name'=>$request->product_name,
                'product_code'=>$request->product_code,
                'product_quantity'=>$request->product_quantity,
                'category_id'=>$request->category_id,
                'subcategory_id'=>$request->subcategory_id,
                'product_size'=>$request->product_size,
                'product_color'=>$request->product_color,
                'selling_price'=>$request->selling_price,
                'product_details'=>$request->product_details,
                'video_link'=>$request->video_link,
                'main_slider'=>$request->main_slider,
                'hot_deal'=>$request->hot_deal,
                'best_rated'=>$request->best_raited,
                'mid_slider'=>$request->mid_slider,
                'hot_new'=>$request->hot_new,
                'trend'=>$request->trend_product,
                'image_one'=>$oneimage,
                'image_two'=>$twoimage,
                'image_three'=>$threeimage,
                'status'=>1,
                'brand_id'=>$request->brand_id,
            // 'best_raited'=>"good",

            ]);
        }
        $product->save();
        $notification = array(
            'message' => 'Data Inserted Successfully', 
            'alert-type' => 'success'
        );
        return redirect('product')->with($notification);



    }

    /**
     * 
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // return $product;
        $categorys=Category::all();
        $subcategorys=Subcat::all();
        $brands=Brand::all();
       return view('admin.product.show',compact('product','categorys','subcategorys','brands'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // return $product->subcategory_id;

// return $user=DB::table('subcats')->where('id',$product->subcategory_id)->value('subcategory_id');
// return $user=DB::table('subcats')->where('id',$product->)->get();

        // return $product;
        $categorys=Category::all();
        $subcategorys=Subcat::all();
        $brands=Brand::all();
        return view('admin.product.edit',compact('product','categorys','subcategorys','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

// dd($request->all());
// images upload
$images=[$request->image_one_new,$request->image_two_new,$request->image_three_new];
$old_image=[$request->old_image_one,$request->old_image_two,$request->old_image_three];
$imageName=[];

foreach ($images as $key => $image) {
if($image){
$imageName[$key]= rand(11111, 99999) . '.' . $image->getClientOriginalExtension();
$image->move(public_path('/media/product/'), $imageName[$key]);
if(isset($old_image[$key])){
unlink(public_path('/media/product/'.$old_image[$key]));   
}
}
else{
$imageName[$key]=$old_image[$key];
}
}

       $fetchdata=Product::find($product->id);
       $fetchdata->product_name=$request->product_name;
       $fetchdata->product_code=$request->product_code;
       $fetchdata->product_quantity=$request->product_quantity;
       $fetchdata->category_id=$request->category_id;
       $fetchdata->subcategory_id=$request->subcategory_id;
       $fetchdata->brand_id=$request->brand_id;
       $fetchdata->product_size=$request->product_size;
       $fetchdata->product_color=$request->product_color;
       $fetchdata->selling_price=$request->selling_price;
       $fetchdata->product_details=$request->product_details;
       $fetchdata->video_link=$request->video_link;
       $fetchdata->main_slider=$request->main_slider;
       $fetchdata->hot_deal=$request->hot_deal;
       $fetchdata->best_rated=$request->best_raited;
       $fetchdata->mid_slider=$request->mid_slider;
       $fetchdata->hot_new=$request->hot_new;
       $fetchdata->trend=$request->trend_product;
       $fetchdata->status=1;
       // images
       $fetchdata->image_one=$imageName[0];
       $fetchdata->image_two=$imageName[1];
       $fetchdata->image_three=$imageName[2];
       $fetchdata->created_at=Carbon::now();
       $fetchdata->save();
        $notification = array(
       'message' => 'Data Update Successfully', 
       'alert-type' => 'success');
      return redirect('product')->with($notification);







    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
         $image_one=$product->image_one;
         $image_two=$product->image_two;
         $image_three=$product->image_three;
        $path_imgone=('/media/product/'. $image_one);
        $path_imgtwo=('/media/product/'. $image_two);
        $path_imgthree=('/media/product/'. $image_three);

        $nn=File::delete(public_path($path_imgone));
        $nn=File::delete(public_path($path_imgtwo));
        $nn=File::delete(public_path($path_imgthree));
        $product->delete();
        $notification = array(
        'message' => 'Data Inserted Successfully', 
        'alert-type' => 'warning');
        return redirect('product')->with($notification);
    }

    public function cat($id)
    {

        return $subcats=DB::table('subcats')->where('category_id',$id)->get();

    }

    public function getSubCatsAjax($id){
        $subcats = $subcats=DB::table('subcats')->where('category_id',$id)->get();
        // $options = "";
        // foreach($subcats as $sub){
        //     $selected = $sub->id == $id ? 'selected' : '';
        //     $options .= "<option value='" . $sub->id . "' . {$selected}>" . $sub->subcategory_name . "</option>";
        // }
        return $subcats;
        return $options;
    }
}
