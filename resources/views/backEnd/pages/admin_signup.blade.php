<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bootstrapmaster.com/live/metro/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:57:00 GMT -->
<head>

    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>Metro Admin Template - Metro UI Style Bootstrap Admin Template</title>
    <meta name="description" content="Metro Admin Template.">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <!-- end: Meta -->

    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->

    <!-- start: CSS -->
    <link id="bootstrap-style" href="{{asset('backEnd/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('backEnd/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
    <link id="base-style" href="{{asset('backEnd/css/style.css')}}" rel="stylesheet">
    <link id="base-style-responsive" href="{{asset('backEnd/css/style-responsive.css')}}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!-- end: CSS -->


    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link id="ie-style" href="{{asset('backEnd/css/ie.css')}}" rel="stylesheet">
    <![endif]-->

    <!--[if IE 9]>
    <link id="ie9style" href="{{asset('backEnd/css/ie9.css')}}" rel="stylesheet">
    <![endif]-->

    <!-- start: Favicon -->
    <link rel="shortcut icon" href="{{asset('backEnd/img/favicon.ico')}}">
    <!-- end: Favicon -->

    <style type="text/css">
        body { background: url(backEnd/img/bg-login.jpg) !important; }
    </style>



</head>

<body>
<div class="container-fluid-full">
    <div class="row-fluid">

        <div class="row-fluid">
            <div class="login-box">
                <div class="icons">
                    <a href="{{route('/')}}"><i class="halflings-icon home"></i></a>
                    <a href="{{route('admin')}}"><i class="halflings-icon cog"></i></a>
                </div>
                <h2>Signup to your account</h2>
                    {!! Form::open(['route' =>'admin-store','class'=>'form-horizontal','method' => 'post']) !!}
                    {{ csrf_field() }}
                        <div class="input-prepend" title="Username">
                            <span class="add-on"><i class="halflings-icon user"></i></span>
                            <input class="input-large span10" name="name" type="text" placeholder="Type Username"/>
                        </div>
                        <div class="clearfix"></div>


                        <div class="input-prepend" title="Username">
                            <span class="add-on"><i class="halflings-icon user"></i></span>
                            <input class="input-large span10" name="email" type="email" placeholder="Type Email"/>
                        </div>
                        <div class="clearfix"></div>

                        <div class="input-prepend" title="Password">
                            <span class="add-on"><i class="halflings-icon lock"></i></span>
                            <input class="input-large span10" name="password" id="password" type="password" placeholder="Type password"/>
                        </div>
                        <div class="clearfix"></div>

                        <div class="input-prepend" title="Password">
                            <span class="add-on"><i class="halflings-icon lock"></i></span>
                            <input class="input-large span10" name="password_confirmation" id="password" type="password" placeholder="Re Enter password"/>
                        </div>
                        <div class="clearfix"></div>

                        <div class="button-login">
                            <button type="submit" class="btn btn-primary">Sign Up Admin</button>
                        </div>
                        <div class="clearfix"></div>
                {!! Form::close() !!}
                <hr>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ol>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ol>
                    </div>
                @endif
            </div><!--/span-->
        </div><!--/row-->


    </div><!--/.fluid-container-->

</div><!--/fluid-row-->

<!-- start: JavaScript-->

<script src="{{asset('backEnd/')}}js/jquery-1.9.1.min.js"></script>
<script src="{{asset('backEnd/')}}js/jquery-migrate-1.0.0.min.js"></script>

<script src="{{asset('backEnd/')}}js/jquery-ui-1.10.0.custom.min.js"></script>

<script src="{{asset('backEnd/')}}js/jquery.ui.touch-punch.js"></script>

<script src="{{asset('backEnd/')}}js/modernizr.js"></script>

<script src="{{asset('backEnd/')}}js/bootstrap.min.js"></script>

<script src="{{asset('backEnd/')}}js/jquery.cookie.js"></script>

<script src='{{asset('backEnd/')}}js/fullcalendar.min.js'></script>

<script src='{{asset('backEnd/')}}js/jquery.dataTables.min.js'></script>

<script src="{{asset('backEnd/js/excanvas.js')}}"></script>
<script src="{{asset('backEnd/js/jquery.flot.js')}}"></script>
<script src="{{asset('backEnd/js/jquery.flot.pie.js')}}"></script>
<script src="{{asset('backEnd/js/jquery.flot.stack.js')}}"></script>
<script src="{{asset('backEnd/js/jquery.flot.resize.min.js')}}"></script>

<script src="{{asset('backEnd/js/jquery.chosen.min.js')}}"></script>

<script src="{{asset('backEnd/js/jquery.uniform.min.js')}}"></script>

<script src="{{asset('backEnd/js/jquery.cleditor.min.js')}}"></script>

<script src="{{asset('backEnd/js/jquery.noty.js')}}"></script>

<script src="{{asset('backEnd/js/jquery.elfinder.min.js')}}"></script>

<script src="{{asset('backEnd/js/jquery.raty.min.js')}}"></script>

<script src="{{asset('backEnd/js/jquery.iphone.toggle.js')}}"></script>

<script src="{{asset('backEnd/js/jquery.uploadify-3.1.min.js')}}"></script>

<script src="{{asset('backEnd/js/jquery.gritter.min.js')}}"></script>

<script src="{{asset('backEnd/js/jquery.imagesloaded.js')}}"></script>

<script src="{{asset('backEnd/js/jquery.masonry.min.js')}}"></script>

<script src="{{asset('backEnd/js/jquery.knob.modified.js')}}"></script>

<script src="{{asset('backEnd/js/jquery.sparkline.min.js')}}"></script>

<script src="{{asset('backEnd/js/counter.js')}}"></script>

<script src="{{asset('backEnd/js/retina.js')}}"></script>

<script src="{{asset('backEnd/js/custom.js')}}"></script>
<!-- end: JavaScript-->

</body>

<!-- Mirrored from bootstrapmaster.com/live/metro/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:57:01 GMT -->
</html>
