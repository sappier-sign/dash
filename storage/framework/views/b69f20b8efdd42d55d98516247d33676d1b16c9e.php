<?php $__env->startSection('content'); ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-md-offset-3 col-md-6 col-xs-12">
                    <div class="white-box">
                        <h3 class="text-center">Change Password</h3>
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p><?php echo e($error); ?></p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                        <form class="form-horizontal form-material" action="" method="post">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group has-feedback <?php echo e(($errors->has('old-password'))? 'has-error' : ''); ?>">
                                <label class="col-md-12">Old Password</label>
                                <div class="col-md-12">
                                    <input type="password" name="old-password" placeholder="old password" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group has-feedback <?php echo e(($errors->has('password'))? 'has-error' : ''); ?>">
                                <label class="col-md-12">New Password</label>
                                <div class="col-md-12">
                                    <input type="password" name="password" placeholder="new password" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group has-feedback <?php echo e(($errors->has('password-retype'))? 'has-error' : ''); ?>">
                                <label class="col-md-12">Confirm Password</label>
                                <div class="col-md-12">
                                    <input type="password" name="password-retype" placeholder="confirm new password" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input class="btn btn-info" type="submit" value="Change Password">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>