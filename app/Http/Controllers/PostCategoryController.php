<?php

namespace App\Http\Controllers;

use App\Models\Post_category;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postcategorys=Post_category::all();
        return view('admin.post_category.index',compact('postcategorys'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post_category.create');
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
            'category_name_en' => 'required',
            'category_name_ur' => 'required',
        ],
        [
         'category_name_en'=>'Please input your post category in english',
         'category_name_ur'=>'Please input your post category in urdu',
     ]);
    // dd($request);

        $postcategory= new Post_category([
            'category_name_en'=>$request->category_name_en,
            'category_name_ur'=>$request->category_name_ur,

        ]);
        $postcategory->save();

        $notification = array(
            'message' => 'Data Inserted Successfully', 
            'alert-type' => 'success'
        );
        return redirect('/blog/postcategory')->with($notification);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post_category  $post_category
     * @return \Illuminate\Http\Response
     */
    public function show(Post_category $post_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post_category  $post_category
     * @return \Illuminate\Http\Response
     */
    public function edit(Post_category $post_category,$id)
    {
        $postcatgory=Post_category::find($id);
        return view('admin.post_category.edit',compact('postcatgory'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post_category  $post_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post_category $post_category,$id)
    {
        // return $request;
        $validatedData= $request->validate([
            'category_name_en' => 'required',
            'category_name_ur' => 'required',
        ],
        [
         'category_name_en'=>'Please input your post category in english',
         'category_name_ur'=>'Please input your post category in urdu',
     ]);
               // return  $data=Post_category::find($id)->all();

        $fetchdata=Post_category::find($id);
        $fetchdata->category_name_en=$request->category_name_en;
        $fetchdata->category_name_ur=$request->category_name_ur;        
        $fetchdata->save();
        $notification = array(
            'message' => 'Data Update Successfully', 
            'alert-type' => 'success');
        return redirect('/blog/postcategory')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post_category  $post_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post_category $post_category,$id)
    {
       $postcatgory=Post_category::find($id);
       $postcatgory->delete();
       $notification = array(
        'message' => 'Data Delete Successfully', 
        'alert-type' => 'warning');
       return redirect('/blog/postcategory')->with($notification);
   }
}
