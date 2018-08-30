<?php

namespace App\Http\Controllers;

use App\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
                Session::put('id','$shipping_id');
                return redirect('payment')->with('msg','Successfull!');
            }

    }
    public function payment()
    {
        $contents=Cart::content();
        return view('frontEnd.pages.payment',compact('contents'));
    }
    public function order(Request $request)
    {
        $payment_method=$request->payment_method;
        // $total=Cart::total();
        // echo $total;

        $pdata=array();
        $pdata['payment_method']=$payment_method;
        $pdata['payment_status']='pending';
        $payment_id=DB::table('payments')
            ->insertGetId($pdata);

        $odata=array();
        $odata['customer_id']=Auth::guard('customer')->user()->id;
        $odata['shipping_id']=Session::get('shipping_id');
        $odata['payment_id']=$payment_id;
        $odata['order_total']=Cart::total();
        $odata['order_status']='pending';
        $order_id=DB::table('orders')
            ->insertGetId($odata);

        $contents=Cart::content();
        $oddata=array();
        foreach ($contents as  $v_content)
        {
            $oddata['order_id']=$order_id;
            $oddata['product_id']=$v_content->id;
            $oddata['product_name']=$v_content->name;
            $oddata['product_price']=$v_content->price;
            $oddata['product_sales_quantity']=$v_content->qty;
            DB::table('order_details')
                ->insert($oddata);
        }
        if ($payment_method=='handcash') {

            Cart::destroy();
            echo "handcash";
            //return view('pages.handcash');


        }elseif ($payment_method=='card') {

            echo "cart";

        }elseif($payment_method=='paypal'){
            echo "paypal";
        }else{
            echo "not selectd";
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


    public function destroy($id)
    {
        //
    }
}
