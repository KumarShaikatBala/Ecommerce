@extends('frontEnd.master')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
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
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
                            <li>Eco Tax <span>{{Cart::tax()}}</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>{{Cart::total()}}</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="{{route('checkout')}}">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
@endsection