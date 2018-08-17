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
                <a href="#">Edit Category</a>
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
                    {!! Form::open(['url' =>'update-category/'.$categories->id,'method' =>'post','enctype'=>'multipart/form-data'])!!}
                    {{ csrf_field() }}
                        <fieldset>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Category Name</label>
                                <div class="controls">
                                    <input type="text" name="category_name" value="{{$categories->category_name}}" class="span6 typeahead" id="typeahead">
                                </div>
                            </div>
                            <div class="control-group hidden-phone">
                                <label class="control-label" for="textarea2">Textarea WYSIWYG</label>
                                <div class="controls">
                                    <textarea class="cleditor" name="category_details" id="textarea2" rows="3">{{$categories->category_details}}</textarea>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Save Category</button>
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