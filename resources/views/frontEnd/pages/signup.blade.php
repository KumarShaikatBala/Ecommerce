@extends('frontEnd.master')
@section('content')
    <section id="form" style="margin: 0 0 50px 0"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ol>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ol>
                            </div>
                        @endif
                        {!! Form::open(['route' =>'customer-store','class'=>'','method' => 'post']) !!}
                        {{ csrf_field() }}
                            <input type="text" name="name" placeholder="Name"/>
                            <input type="email" name="email" placeholder="Email Address"/>
                            <input type="text" name="mobile" placeholder="Mobile Number"/>
                            <input type="password" name="password" placeholder="Password"/>
                            <input type="password" name="password_confirmation" placeholder="Password"/>
                            <button type="submit" class="btn btn-default">Signup</button>
                        {!! Form::close() !!}
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->


@endsection