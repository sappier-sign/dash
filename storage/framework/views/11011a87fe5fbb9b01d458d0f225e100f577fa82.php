<?php $__env->startSection('content'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-md-offset-3 col-md-6 col-xs-12">
                <div class="white-box">
                    <h3>New Merchant</h3>
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p><?php echo e($error); ?></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                    <form class="form-horizontal form-material" method="post" action="">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <div class="col-md-6">
                                <input type="text" placeholder="Company Name" name="company" class="form-control form-control-line" value="<?php echo e(old('company')); ?>"> </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Email" name="api-email" class="form-control form-control-line" value="<?php echo e(old('company')); ?>"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <input type="tel" placeholder="Telephone" name="telephone" class="form-control form-control-line" value="<?php echo e(old('telephone')); ?>"> </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Address" name="address" class="form-control form-control-line" value="<?php echo e(old('address')); ?>"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 col-xs-12">
                                <label for="actions">Actions:</label>
                                <select class="form-control" id="actions" name="actions[]" multiple size="2">
                                    <option value="" disabled selected hidden>Select Account Type</option>
                                    <option value="purchase">Purchase</option>
                                    <option value="transfer">Funds Transfer</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 text-right">
                                <button class="btn btn-info">Create Merchant</button>
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