<?php

namespace App\Http\Controllers;

use App\Slider;
use function compact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function view;

class HomeController extends Controller
{

    public function index()
    {
        $sliders=Slider::all()
            ->where('publication_status','1');
        $brands=DB::table('brands')
            ->where('publication_status','1')
            ->get();
        $products=DB::table('products')
            ->join('categories','products.category_id','=','categories.id')
            ->join('brands','products.brand_id','=','brands.id')
            ->select('products.*','categories.category_name','brands.brand_name')
            ->where('products.publication_status','1')
            ->get();
        return view('frontEnd.index',compact('sliders','brands','products'));
    }

}
