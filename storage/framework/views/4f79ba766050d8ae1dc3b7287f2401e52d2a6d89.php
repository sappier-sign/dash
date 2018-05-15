<!DOCTYPE html>
<html>
<?php echo $__env->make('components.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldPushContent('styles'); ?>
<body>
<!-- Preloader -->
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>

<!-- Site wrapper -->
<div id="wrapper">

<?php echo $__env->make('components.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!--left column side bar-->
<?php echo $__env->make('components.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->

    <!-- /.content-wrapper -->
    <?php echo $__env->yieldContent('content'); ?>
</div>
<?php echo $__env->make('components.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components.modality', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
<script src="<?php echo e(asset('css/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo e(asset('css/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>

<script src="<?php echo e(asset('js/jquery.dataTables.min.js')); ?>"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?php echo e(asset('css/bower_components/metisMenu/dist/metisMenu.min.js')); ?>"></script>
<!--Nice scroll JavaScript -->
<script src="<?php echo e(asset('js/jquery.nicescroll.js')); ?>"></script>
<!--Morris JavaScript -->
<script src='//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js'></script>

<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<!--Wave Effects -->
<script src="<?php echo e(asset('js/waves.js')); ?>"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo e(asset('js/myadmin1.js')); ?>"></script>
<script src="<?php echo e(asset('js/dashboard1.js')); ?>"></script>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>