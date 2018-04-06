<!DOCTYPE html>
<html>
@include('components.head')
<body>
<!-- Preloader -->
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>

<!-- Site wrapper -->
<div id="wrapper">
{{--The Header--}}
@include('components.header')
{{--End the Header--}}
<!--left column side bar-->
@include('components.sidebar')

<!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->

    <!-- /.content-wrapper -->
    @yield('content')
</div>
@include('components.footer')
@include('components.modality')
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>

<!-- ./wrapper -->
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token()
    ]); ?>
</script>
<!-- jQuery -->
<script src="{{asset('css/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('css/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
{{--DataTables--}}
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<!-- Menu Plugin JavaScript -->
<script src="{{asset('css/bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>
<!--Nice scroll JavaScript -->
<script src="{{asset('js/jquery.nicescroll.js')}}"></script>
<!--Morris JavaScript -->
<script src='//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js'></script>

<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<!--Wave Effects -->
<script src="{{asset('js/waves.js')}}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{asset('js/myadmin.js')}}"></script>
<script src="{{asset('js/dashboard1.js')}}"></script>
@stack('scripts')
</body>
</html>