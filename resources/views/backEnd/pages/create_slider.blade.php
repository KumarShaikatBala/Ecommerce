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
            <li>
                <i class="icon-edit"></i>
                <a href="#">Slider </a>
            </li>
        </ul>

        <div class="row-fluid sortable">
            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
                    <div class="box-icon">
                        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    {!! Form::open(['url' =>'store-slider','method' =>'post','enctype'=>'multipart/form-data'])!!}
                    {{ csrf_field() }}
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Slider Image</label>
                            <div class="controls">
                                <div class="uploader" id="uniform-fileInput"><div class="uploader" id="uniform-fileInput"><input class="input-file uniform_on" id="fileInput" name="slider" type="file"><span class="filename" style="-moz-user-select: none;">No file selected</span><span class="action" style="-moz-user-select: none;">Choose File</span></div><span class="filename" style="user-select: none;">No file selected</span><span class="action" style="user-select: none;">Choose File</span></div>
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label" for="typeahead">Slider Name</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="typeahead"  name="slider_name">
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Slider Text</label>
                            <div class="controls">
                                <textarea class="cleditor" id="textarea2" rows="3" name="slider_details"></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Publication status
                                <div class="checker" id="uniform-inlineCheckbox1"><span class=""><input type="checkbox" id="inlineCheckbox1" name="publication_status" value="1"></span></div>

                            </label>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Add</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                    {!! Form::close() !!}

                </div>
            </div><!--/span-->

        </div><!--/row-->

    </div><!--/.fluid-container-->

    <!-- end: Content -->


@endsection