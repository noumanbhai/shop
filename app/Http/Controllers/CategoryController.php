<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys=Category::all();
        return view('admin.category.index',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'category_name' => 'required|unique:categories',
        ],
        [
           'category_name'=>'Please input your cateory',
       ]);
    // dd($request);

        $category= new Category([
            'category_name'=>$request->category_name,
    //         // 'created_at'=>Carbon::now(),

        ]);
        $category->save();

        $notification = array(
            'message' => 'Data Inserted Successfully', 
            'alert-type' => 'success'
        );
        return redirect('category')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validatedData= $request->validate([
            'category_name' => 'required|unique:categories',
        ],
        [
           'category_name'=>'Please input your cateory',
       ]);
        $fetchdata=Category::find($category->id);
        $fetchdata->category_name=$request->category_name;
        $fetchdata->save();
        $notification = array(
            'message' => 'Data Update Successfully', 
            'alert-type' => 'success');
        return redirect('category')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        $notification = array(
        'message' => 'Data Delete Successfully', 
        'alert-type' => 'warning');
        return redirect('category')->with($notification);


    }
}
