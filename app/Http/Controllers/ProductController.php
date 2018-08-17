<?php

namespace App\Http\Controllers;

use App\Product;
use function compact;
use Illuminate\Http\Request;
use function redirect;
use function view;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index()
    {
        //$products=Product::all();

        $products=DB::table('products')
        ->join('categories','products.category_id','=','categories.id')
        ->join('brands','products.brand_id','=','brands.id')
        ->select('products.*','categories.category_name','brands.brand_name')
        ->get();
        return view('backEnd.pages.products',compact('products'));
    }


    public function create()
    {
        return view('backEnd.pages.create_product');
    }


    public function store(Request $request)
    {

        if ($request->hasFile('product_img')){
            $product_img=$request->file('product_img');
            $product_img_name=$product_img->getClientOriginalName();
            $ext = $request->product_img->getClientOriginalExtension();
            $product_img_name=time().'.'.$ext;
            $upload_path_for_company_img='uploaded_files/product_img/';
            $product_img->move( $upload_path_for_company_img,$product_img_name);
        }

        if(Product::create([
            'product_name'=>$request->product_name,
            'category_id'=>$request->category_id,
            'brand_id'=>$request->brand_id,
            'product_short_description'=>$request->product_short_description,
            'product_long_description'=>$request->product_long_description,
            'product_price'=>$request->product_price,
            'product_img'=>$product_img_name,
            'product_size'=>$request->product_size,
            'product_color'=>$request->product_color,
            'publication_status'=>$request->publication_status,
        ]))
        {
            return redirect('products')->with('msg','product Added Successfully');
        }

    }


    public function show($id)
    {
        $product=Product::find($id);
        $categories=DB::table('categories')
            ->where('publication_status','1')
            ->get();
        $brands=DB::table('brands')
            ->where('publication_status','1')
            ->get();
        return view('frontEnd.pages.product_details',compact('product','categories','brands'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('products')->with('msg','product Deleted Successfully');
    }


    public function active($id)
    {
        DB::table('products')
            ->where('id',$id)
            ->update(['publication_status'=>1]);
        return redirect('products')->with('msg','product Activated Successfully');
    }
    public function deactive($id)
    {
        DB::table('products')
            ->where('id',$id)
            ->update(['publication_status'=>0]);
        return redirect('products')->with('msg','product Deactivates Successfully');
    }

}
