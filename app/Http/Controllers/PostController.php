<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Post_category;
use Illuminate\Http\Request;
use File;
use Intervention\Image\ImageManagerStatic as Image;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postcats=Post_category::all();
        return view('admin.post.create',compact('postcats'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $image_one=$request->post_image;
        if ($image_one) {

            $image_one_name=hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(300,300)->save(public_path('/media/post/'.$image_one_name));
            $oneimage = $image_one_name;
            $post= new Post([
                'post_title_en'=>$request->post_title_en,
                'post_title_ur'=>$request->post_title_ur,
                'category_id'=>$request->category_id,
                'details_en'=>$request->details_en,
                'details_ur'=>$request->details_ur,
                'post_image'=>$oneimage,
            ]);
            $post->save();
            $notification = array(
                'message' => 'Data Inserted Successfully', 
                'alert-type' => 'success'
            );
            return redirect('/blog/post')->with($notification);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $postcats=Post_category::all();
        // return view('admin.post.edit');
        return view('admin.post.edit',compact('postcats','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if($request->image_one_new==null){
            $request->merge(['image_one_new'=>$request->old_image_one]);
        }
        $image=$request->file('image_one_new');
        if ($image) {
            $image_one_name=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save(public_path('/media/post/'.$image_one_name));
            unlink(public_path('/media/post/'.$request->old_image_one));
            $oneimage = $image_one_name;
        }else{
            $image_one_name=$request->old_image_one;   
        }
        $fetchdata=Post::find($post->id);
        $fetchdata->post_title_en=$request->post_title_en;
        $fetchdata->post_title_ur=$request->post_title_ur;
        $fetchdata->category_id=$request->category_id;
        $fetchdata->details_en=$request->details_en;
        $fetchdata->details_ur=$request->details_ur;
        $fetchdata->post_image=$image_one_name;
        $fetchdata->save();
        $notification = array(
         'message' => 'Data Update Successfully', 
         'alert-type' => 'success');
        return redirect('/blog/post')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
       $image_one=$post->post_image;
       $path_imgone=('/media/post/'. $image_one);
       $nn=File::delete(public_path($path_imgone));
       $post->delete();
       $notification = array(
        'message' => 'Data Inserted Successfully', 
        'alert-type' => 'warning');
       return redirect('/blog/post')->with($notification);
   }

}
