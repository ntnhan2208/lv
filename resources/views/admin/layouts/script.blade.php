<script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('admin/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/assets/js/metisMenu.min.js')}}"></script>
<script src="{{asset('admin/assets/js/waves.min.js')}}"></script>
<script src="{{asset('admin/assets/js/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/moment/moment.js')}}"></script>
<script src="{{asset('admin/assets/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('admin/assets/pages/jquery.sweet-alert.init.js')}}"></script>
<script src="{{asset('admin/assets/plugins/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('admin/assets/pages/jquery.form-editor.init.js')}}"></script>
<script src="{{asset('admin/assets/assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<script src="{{asset('admin/assets/pages/jquery.validation.init.js')}}"></script>
<script src="{{asset('admin/assets/js/editor.js')}}"></script>
<script src="{{asset('admin/assets/js/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('admin/assets/pages/jquery.form-upload.init.js')}}"></script>


<script src="{{asset('admin/assets/plugins/apexcharts/apexcharts.min.js')}}"></script>
<script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
<script src="https://apexcharts.com/samples/assets/ohlc.js"></script>
<!-- Required datatable js -->
<script src="{{asset('admin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/peity-chart/jquery.peity.min.js')}}"></script>


<script src="{{asset('admin/assets/js/app.js')}}"></script>
@include('ckfinder::setup')
<script src={{ asset('ckeditor/ckeditor.js') }}></script>

<script>
    $("body").on('input', '.integerInput', function () {
        $(this).val($(this).val().replace(/[^0-9]/gi, ''));
    });

</script>
@toastr_js
@toastr_render
@yield('script')
