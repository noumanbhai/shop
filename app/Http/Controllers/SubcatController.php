<?php

namespace App\Http\Controllers;

use App\Models\Subcat;
use App\Models\Category;
use Illuminate\Http\Request;

class SubcatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcats=Subcat::all();
        return view('admin.subcategory.index',compact('subcats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categorys=Category::all();
        return view('admin.subcategory.create',compact('categorys'));
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
            'subcategory_name' => 'required',
        ],
        [
           'subcategory_name'=>'Please input your subcateory',
       ]);
    // dd($request);

        $subcategory= new Subcat([
            'subcategory_name'=>$request->subcategory_name,
            'category_id'=>$request->category_id,
        ]);
        $subcategory->save();

        $notification = array(
            'message' => 'Data Inserted Successfully', 
            'alert-type' => 'success'
        );
        return redirect('subcategory')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcat  $subcat
     * @return \Illuminate\Http\Response
     */
    public function show(Subcat $subcat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcat  $subcat
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcat $subcat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcat  $subcat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcat $subcat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcat  $subcat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcat $subcat,$id)
    {
        $sub=Subcat::find($id);
        $sub->delete();
        $notification = array(
        'message' => 'Data Delete Successfully', 
        'alert-type' => 'warning');
        return redirect('subcategory')->with($notification);

    }
}
