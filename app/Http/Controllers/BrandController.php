<?php

namespace App\Http\Controllers;

use App\Brand;
use function compact;
use Illuminate\Http\Request;
use function redirect;
use function view;
use Illuminate\Support\Facades\DB;

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
        return view('backEnd.pages.brands',compact('brands'));
    }
    public function show_brand($id)
    {
        $brand_products=DB::table('products')
            ->join('categories','products.category_id','=','categories.id')
            ->select('products.*','categories.category_name')
            ->where('brands.id',$id)
            ->where('products.publication_status','1')
            ->get();
        return view('frontEnd.pages.product_by_brand',compact('brand_products'));
    }
    public function create()
    {
        return view('backEnd.pages.create_brand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Brand::create([
            'brand_name'=>$request->brand_name,
            'brand_details'=>$request->brand_details,
            'publication_status'=>$request->publication_status,
        ]))
        {
            return redirect('brands')->with('msg','Brand Stored Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands=Brand::find($id);
        return view('backEnd.pages.edit_brand',compact('brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categories=Brand::find($id);
        $categories->update($request->all());
        return redirect('brands')->with('msg','Brand Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::destroy($id);
        return redirect('brands');
    }
    public function active($id)
    {
        DB::table('brands')
            ->where('id',$id)
            ->update(['publication_status'=>1]);
        return redirect('brands')->with('msg','Brand Activated Successfully');
    }
    public function deactive($id)
    {
        DB::table('brands')
            ->where('id',$id)
            ->update(['publication_status'=>0]);
        return redirect('brands')->with('msg','Brand Deactivated Successfully');
    }
}
