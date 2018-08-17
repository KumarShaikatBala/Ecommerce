@extends('backEnd.master')
@section('content')
    <!-- start: Content -->
    <div id="content" class="span10">


        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="index.html">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="#">Sliders</a></li>
        </ul>

        <div class="row-fluid sortable">
            <div class="box span12">
                <div class="box-header" data-original-title>
                    @if(Session::has('msg'))
                        <h2 id="msg" class="alert-info"><i class="halflings-icon user"></i><span class="break"></span>{{session::get('msg')}}</h2>
                    @endif
                    <script>
                        setTimeout(function() {
                            $('#msg').fadeOut('fast');
                        }, 2000);
                    </script>
                    <h2><i class="halflings-icon user"></i><span class="break"></span>Admin Name</h2>
                    <div class="box-icon">
                        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                        <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Slider</th>
                            <th>Slider Name</th>
                            <th>Slider Details</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $slider)
                            <tr>
                                <td>{{$slider->id}}</td>
                                <td><img src="/uploaded_files/slider_img/{{$slider->slider}}" alt="Product"></td>
                                <td class="center">{{$slider->slider_name}}</td>
                                <td class="center">{!!$slider->slider_details!!}</td>
                                <td class="center">
                                    @if($slider->publication_status==1)
                                        <span class="label label-success">Active</span>
                                    @else
                                        <span class="label label-danger">Deactive</span>
                                    @endif
                                </td>
                                <td class="center">
                                    @if($slider->publication_status==1)
                                        <a class="btn btn-danger" href="{{route('deactive-slider',['id'=>$slider->id])}}">
                                            <i class="halflings-icon white thumbs-down"></i>
                                        </a>
                                    @else
                                        <a class="btn btn-success" href="{{route('active-slider',['id'=>$slider->id])}}">
                                            <i class="halflings-icon white thumbs-up"></i>
                                        </a>
                                    @endif
                                    <a class="btn btn-danger" href="{{route('destroy-slider',['id'=>$slider->id])}}">
                                        <i class="halflings-icon white trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--/span-->

        </div><!--/row-->






    </div><!--/.fluid-container-->


    @endsection