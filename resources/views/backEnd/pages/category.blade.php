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
            <li><a href="#">Category</a></li>
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
                            <th>Category Name</th>
                            <th>Category Details</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td class="center">{{$category->category_name}}</td>
                            <td class="center">{!!$category->category_details!!}</td>
                            <td class="center">
                                @if($category->publication_status==1)
                                <span class="label label-success">Active</span>
                                    @else
                                    <span class="label label-danger">Deactive</span>
                                    @endif
                            </td>
                            <td class="center">
                                @if($category->publication_status==1)
                                <a class="btn btn-danger" href="{{route('deactive-category',['id'=>$category->id])}}">
                                    <i class="halflings-icon white thumbs-down"></i>
                                </a>
                                @else
                                    <a class="btn btn-success" href="{{route('active-category',['id'=>$category->id])}}">
                                        <i class="halflings-icon white thumbs-up"></i>
                                    </a>
                                @endif
                                <a class="btn btn-info" href="{{route('edit-category',['id'=>$category->id])}}">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                                <a class="btn btn-danger" href="{{route('destroy-category',['id'=>$category->id])}}">
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

    <!-- end: Content -->

@endsection