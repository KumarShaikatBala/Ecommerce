</div><!--/#content.span10-->
</div><!--/fluid-row-->


<div class="modal hide fade" id="myModal">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Settings</h3>
    </div>
    <div class="modal-body">
        <p>Here settings can be configured...</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
        <a href="#" class="btn btn-primary">Save changes</a>
    </div>
</div>

<div class="clearfix"></div>

<footer>

    <p>
        <span style="text-align:left;float:left">&copy; 2013 <a href="http://bootstrapmaster.com/" alt="Bootstrap Themes">creativeLabs</a></span>
        <span class="hidden-phone" style="text-align:right;float:right">Powered by: <a href="http://admintemplates.co/" alt="Bootstrap Admin Templates">Metro</a></span>
    </p>

</footer>

<!-- start: JavaScript-->

<script src="{{asset('backEnd/js/jquery-1.9.1.min.js')}}"></script>
<script src="{{asset('backEnd/js/jquery-migrate-1.0.0.min.js')}}"></script>

<script src="{{asset('backEnd/js/jquery-ui-1.10.0.custom.min.js')}}"></script>

<script src="{{asset('backEnd/js/jquery.ui.touch-punch.js')}}"></script>

<script src="{{asset('backEnd/js/modernizr.js')}}"></script>

<script src="{{asset('backEnd/js/bootstrap.min.js')}}"></script>

<script src="{{asset('backEnd/js/jquery.cookie.js')}}"></script>

<script src='{{asset('backEnd/js/fullcalendar.min.js')}}'></script>

<script src='{{asset('backEnd/js/jquery.dataTables.min.js')}}'></script>

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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<script type="text/javascript">
    $(document).on("click", "#delete", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        bootbox.confirm("Are you want to delete!!", function(confirmed){
            if (confirmed) {
                window.location.href = link;
            };
        });
    });
</script>
<!-- end: JavaScript-->

</body>

<!-- Mirrored from bootstrapmaster.com/live/metro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:56:47 GMT -->
</html>