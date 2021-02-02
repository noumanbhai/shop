<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use Carbon;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands=Brand::all();
        return view('admin.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData= $request->validate([
            'brand_name' => 'required',
            'brand_image'=> 'required',
        ],
        [
           'brand_name'=>'Please input your brand name',
           'brand_image'=>'Please upload your brand image',

       ]);
        $brand_name=$request->brand_name;
        $image=$request->file('brand_image');
        if ($image) {
           $imageName = rand(11111, 99999) . '.' . $image->  getClientOriginalExtension();
           $image->move(public_path('images'), $imageName);
    // return $imageName;

           Brand::insert([
            'brand_name'=>$brand_name,
            'brand_image'=>$imageName,
            'created_at'=>Carbon::now(),

        ]);
            $notification = array(
            'message' => 'Data Inserted Successfully', 
            'alert-type' => 'success');
        return redirect('brand')->with($notification);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $validatedData= $request->validate([
            'brand_name' => 'required',
            // 'brand_image'=> 'required',
        ],
        [
           'brand_name'=>'Please input your brand name',
           // 'brand_image'=>'Please upload your brand image',

       ]);
          if($request->brand_image==null){
            $request->merge(['brand_image'=>$request->old_image]);
        }

        $image=$request->file('brand_image');
        
        if ($image) {
           $imageName = rand(11111, 99999) . '.' . $image->  getClientOriginalExtension();
           $image->move(public_path('images'), $imageName);
           unlink(public_path('images/'.$request->old_image));
       }else{
           $imageName=$request->old_image;   
       }  
       $fetchdata=Brand::find($request->id);
       $fetchdata->brand_name=$request->brand_name;
       $fetchdata->brand_image=$imageName;
       $fetchdata->created_at=Carbon::now();
       $fetchdata->save();
       $notification = array(
       'message' => 'Data Update Successfully', 
       'alert-type' => 'success');
      return redirect('brand')->with($notification);
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $image=$brand->brand_image;
        $path_img=('images/'.$image);
        $nn=File::delete(public_path($path_img));
        $brand->delete();
        $notification = array(
        'message' => 'Data Inserted Successfully', 
        'alert-type' => 'warning');
        return redirect('brand')->with($notification);

    }
}
