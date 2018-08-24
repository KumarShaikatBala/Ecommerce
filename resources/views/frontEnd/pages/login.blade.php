@extends('frontEnd.master')
@section('content')
    <section id="form" style="margin: 0 0 50px 0"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ol>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ol>
                            </div>
                        @endif

                        @if(Session::has('msg'))
                            <h2 id="msg" class="alert-info"><i class="halflings-icon user"></i><span class="break"></span>{{session::get('msg')}}</h2>
                        @endif
                        <script type="text/javascript">
                            setTimeout(function(){
                                $('#msg').fadeOut('fast');
                            }, 2000);
                        </script>

                        {!! Form::open(['route' =>'customer','class'=>'','method' => 'post']) !!}
                        {{ csrf_field() }}
                            <input type="email" name="email" placeholder="Email Address" />
                            <input type="password" name="password" placeholder="Enter Your Password" />
                            <span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
                            <button type="submit" class="btn btn-default">Login</button>
                        {!! Form::close() !!}
                    </div><!--/login form-->
                </div>
            </div>
        </div>
    </section><!--/form-->


@endsection