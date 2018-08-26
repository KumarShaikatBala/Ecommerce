<?php

namespace App\Http\Controllers;

use App\Shipping;
use Illuminate\Http\Request;
use function view;
use App\Product;
use function compact;
use function dd;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use function print_r;
use function redirect;
use Gloudemans\Shoppingcart;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer');
    }
    public function index()
    {

    }

    public function create()
    {
        $contents=Cart::content();
        return view('frontEnd.pages.checkout',compact('contents'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name' =>'required|string|max:255',
            'mobile' => 'required|numeric|min:11',
            'email' => 'required|string|email|max:255|unique:users',
            'address_1' => 'required|string',
        ]);
            if( Shipping::create([
                'name' => $request->name,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'address_1' => $request->address_1,
                'address_2' => $request->address_2,
            ])){
                return redirect('payment')->with('msg','Successfull!');
            }

    }
    public function payment()
    {
        $contents=Cart::content();
        return view('frontEnd.pages.payment',compact('contents'));
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        //
    }
}
