<?php

namespace App\Http\Controllers;

use App\Product;
use function compact;
use function dd;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function print_r;
use function redirect;
use function view;
use Gloudemans\Shoppingcart;

class CartController extends Controller
{

    public function index()
    {

    }


    public function create()
    {
        //
    }


    public function store(Request $request,$id)
    {
        $qty=$request->qty;

        $product_info=Product::all()
        ->where('id',$id)
        ->first();

        /*{{"<pre>";}}
        print_r($product_info);
            {{"<pre>";}}*/

        //return $qty;

        $data['qty']=$qty;
        $data['name']=$product_info->product_name;
        $data['id']=$product_info->id;
        $data['price']=$product_info->product_price;
        $data['options']['image']=$product_info->product_img;

       Cart::add($data);
       //$contents=Cart::content();
       //Cart::content();
        //return view('frontEnd.pages.cart',compact('contents'));
        return redirect('cart');
    }
    public function show_cart()
    {
        $contents=Cart::content();
        return view('frontEnd.pages.cart',compact('contents'));
    }


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
        //
    }

    public function destroy($id)
    {
       Cart::update($id,0);
       return redirect('cart');
    }
    public function update(Request $request, $id)
    {
        $qty=$request->qty;
        Cart::update($id,$qty);
        return redirect('cart');
    }
}
