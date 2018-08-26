@extends('frontEnd.master')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Check out</li>
                </ol>
            </div><!--/breadcrums-->
            <div class="register-req">
                <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
            </div><!--/register-req-->

            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-10 clearfix col-sm-offset-4">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ol>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ol>
                            </div>
                        @endif
                        <div class="bill-to">
                            <p>Bill To</p>
                            <div class="form-one">
                                {!! Form::open(['url' =>'shipping-store/'.$id=Auth::guard('customer')->user()->id,'method' =>'post','enctype'=>'multipart/form-data'])!!}
                                {{ csrf_field() }}
                                    <input type="text" name="name" value="{{Auth::guard('customer')->user()->name}}" placeholder="Full Name *">
                                    <input type="text" name="mobile" value="{{Auth::guard('customer')->user()->mobile}}" placeholder="Mobile Number">
                                    <input type="text" name="email" value="{{Auth::guard('customer')->user()->email}}" placeholder="Email*">
                                    <input type="text" name="address_1" placeholder="Address 1 *">
                                    <input type="text" name="address_2" placeholder="Address 2">
                                    <button type="submit" value="Submit">Submit</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="review-payment">
                <h2>Review & Payment</h2>
            </div>

            <div class="table-responsive cart_info">

                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contents as $content)
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="/uploaded_files/product_img/{{$content->options->image}}" height="80px" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="{{route('show-product',['id'=>$content->id])}}">{{$content->name}}</a></h4>
                            </td>
                            <td class="cart_price">
                                <p>{{$content->price}}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    {!! Form::open(['url' =>'update-cart/'.$content->rowId,'method' =>'post','enctype'=>'multipart/form-data'])!!}
                                    {{ csrf_field() }}
                                    <input class="cart_quantity_input" type="text" name="qty" value="{{$content->qty}}" autocomplete="off" size="2">
                                    <button type="submit" class="alert-heading" href=""> Update Quantity </button>
                                    {!! Form::close() !!}
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{$content->total}}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{route('delete-cart',['id'=>$content->rowId])}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>Cart Sub Total</td>
                                    <td>{{Cart::subtotal()}}</td>
                                </tr>
                                <tr>
                                    <td>Exo Tax</td>
                                    <td>{{Cart::tax()}}</td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Shipping Cost</td>
                                    <td>Free</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><span>{{Cart::total()}}</span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->


@endsection