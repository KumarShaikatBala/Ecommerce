<?php

namespace App\Http\Controllers;

use App\Category;
use function compact;
use function dd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use function redirect;
use function view;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('backEnd.pages.category',compact('categories'));
    }

    public function show_category($id)
    {
        $category_products=DB::table('products')
            ->join('categories','products.category_id','=','categories.id')
            ->select('products.*','categories.category_name')
            ->where('categories.id',$id)
            ->where('products.publication_status','1')
            ->get();
        $categories=DB::table('categories')
            ->where('publication_status','1')
            ->get();
        $brands=DB::table('brands')
            ->where('publication_status','1')
            ->get();
        return view('frontEnd.pages.product_by_category',compact('category_products','categories','brands'));
    }
    public function create()
    {
        return view('backEnd.pages.add_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Category::create([
            'category_name'=>$request->category_name,
            'category_details'=>$request->category_details,
            'publication_status'=>$request->publication_status,
        ]))
        {
            return redirect('category');
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
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $categories=Category::find($id);
        return view('backEnd.pages.edit_category',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $categories=Category::find($id);
        $categories->update($request->all());
        return redirect('category');
    }
    public function active($id)
{
    //dd($id);
     DB::table('categories')
        ->where('id',$id)
        ->update(['publication_status'=>1]);
    return redirect('category');
}
    public function deactive($id)
    {
        //dd($id);

         DB::table('categories')
            ->where('id',$id)
            ->update(['publication_status'=>0]);
        return redirect('category');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Category::destroy($id);

        return redirect('category');
    }
}
