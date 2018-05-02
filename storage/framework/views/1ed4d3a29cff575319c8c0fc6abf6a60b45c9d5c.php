<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Api Credentials
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#"><i class="fa fa-key"></i> ApiKey</a>
                </li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-xs-12 col-md-6 col-md-offset-3">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Details</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Api User:</label>
                                        <input type="text" class="form-control" value="<?php echo e($token['user_name']); ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Token:</label>
                                        <input type="text" class="form-control" value="<?php echo e($token['api_key']); ?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>