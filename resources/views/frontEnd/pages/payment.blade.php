@extends('frontEnd.master')
@section('content')
    <section id="cart_items">
        <div class="container">
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
    </section>
    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
            </div>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Payment method</li>
                </ol>
            </div>
            <div class="paymentCont col-sm-8">
                <div class="headingWrap">
                    <h3 class="headingTop text-center">Select Your Payment Method</h3>
                    <p class="text-center">Created with bootsrap button and using radio button</p>
                </div>
                {!! Form::open(['url' =>'order'.$id=Auth::guard('customer')->user()->id,'method' =>'post','enctype'=>'multipart/form-data'])!!}
                {{ csrf_field() }}
                    <input type="radio" name="payment_method" value="handcash"> Hand Cash<br>
                    <input type="radio" name="payment_method" value="cart"> Debit Card<br>
                    <input type="radio" name="payment_method" value="paypal"> Paypal<br>
                    <input type="submit" name="" value="Done">
                {!! Form::close() !!}

            </div>
        </div>
    </section><!--/#do_action-->

    @endsection