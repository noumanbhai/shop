<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons=Coupon::all();
        return view('admin.coupon.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupon.create');
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
            'coupon' => 'required',
            'discount' => 'required',
        ],
        [
           'coupon'=>'Please input your coupon code',
           'discount'=>'Please input your coupon discount',
       ]);
        $coupon= new Coupon([
            'coupon'=>$request->coupon,
            'discount'=>$request->discount,

        ]);
        $coupon->save();

        $notification = array(
            'message' => 'Data Inserted Successfully', 
            'alert-type' => 'success'
        );
        return redirect('coupon')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        return view('admin.coupon.edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        $validatedData= $request->validate([
            'coupon' => 'required',
            'discount' => 'required',
        ],
        [
           'coupon'=>'Please input your coupon code',
           'discount'=>'Please input your coupon discount',
       ]);
        $fetchdata=Coupon::find($coupon->id);
        $fetchdata->coupon=$request->coupon;
        $fetchdata->discount=$request->discount;
        $fetchdata->save();
        $notification = array(
            'message' => 'Data Update Successfully', 
            'alert-type' => 'success');
        return redirect('coupon')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        $notification = array(
            'message' => 'Data Delete Successfully', 
            'alert-type' => 'warning');
        return redirect('coupon')->with($notification);
    }
}
