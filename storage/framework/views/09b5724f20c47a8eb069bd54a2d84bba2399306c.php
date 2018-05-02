<?php echo $__env->make('components.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <?php echo $__env->make('components.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!---->
    <!--left column side bar-->
    <?php echo $__env->make('components.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->

    <!-- /.content-wrapper -->
    <?php echo $__env->yieldContent('content'); ?>
    <!-- /.content -->
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


<script type="text/javascript" charset="utf8" src="<?php echo e(asset('js/momentjs.js')); ?>"></script>
<script type="text/javascript" charset="utf8" src="<?php echo e(asset('js/app.js')); ?>"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
        $('.dataTable').DataTable();
    });
</script>
</body>
</html>
