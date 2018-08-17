<?php

namespace App\Http\Controllers;

use App\Slider;
use function compact;
use Illuminate\Http\Request;
use function redirect;
use function view;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=Slider::all();
        return view('backEnd.pages.sliders',compact('sliders'));
    }


    public function create()
    {
        return view('backEnd.pages.create_slider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('slider')){
            $slider=$request->file('slider');
            $slider_img=$slider->getClientOriginalName();
            $ext = $request->slider->getClientOriginalExtension();
            $slider_img=time().'.'.$ext;
            $upload_path_for_company_img='uploaded_files/slider_img/';
            $slider->move( $upload_path_for_company_img,$slider_img);
        }
        if (Slider::create([
            'slider'=>$slider_img,
            'slider_name'=>$request->slider_name,
            'slider_details'=>$request->slider_details,
            'publication_status'=>$request->publication_status,
        ]));
        {
            return redirect('sliders')->with('msg','Slider Added Successfully');
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     Slider::destroy($id);
        return redirect('sliders')->with('msg','Slider Deleted Successfully');
    }
    public function active($id)
    {
        DB::table('sliders')
            ->where('id',$id)
            ->update(['publication_status'=>1]);
        return redirect('sliders')->with('msg','Slider Activated Successfully');
    }
    public function deactive($id)
    {
        DB::table('sliders')
            ->where('id',$id)
            ->update(['publication_status'=>0]);
        return redirect('sliders')->with('msg','Slider Deactivates Successfully');
    }
}
