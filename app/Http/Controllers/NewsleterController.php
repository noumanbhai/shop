<?php

namespace App\Http\Controllers;

use App\Models\Newsleter;
use Illuminate\Http\Request;

class NewsleterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsleters=Newsleter::all();
        return view('admin.news.index',compact('newsleters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Newsleter  $newsleter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsleter $newsleter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Newsleter  $newsleter
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsleter $newsleter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Newsleter  $newsleter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newsleter $newsleter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newsleter  $newsleter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsleter $newsleter,$id)
    {
        $new=Newsleter::find($id);
        $new->delete();
        $notification = array(
        'message' => 'Data Delete Successfully', 
        'alert-type' => 'warning');
        return redirect('other')->with($notification);
    }
}
