<?php $__env->startSection('content'); ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3>Merchants <span class="hide-menu col-md-2 pull-right"><a href="<?php echo e(url('merchants/create')); ?>" class="btn btn-info btn-block btn-rounded waves-effect waves-light">Add Merchant</a></span></h3>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                <tr role="row">
                                    <th>Company Name</th>
                                    <th>API User</th>
                                    <th class="">Merchant ID</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(isset($merchants)): ?>
                                    <?php if(count($merchants) === 0): ?>
                                        <tr role="row">
                                            <td colspan="7" class="text-center">No Users Found!</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php $__currentLoopData = $merchants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $merchant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr role="row" class="">
                                                <td><?php echo e($merchant['company']); ?></td>
                                                <td><?php echo e($merchant['apiuser']); ?></td>
                                                <td><?php echo e($merchant['merchant_id']); ?></td>
                                                <td><?php echo e($merchant['email']); ?></td>
                                                <td><?php echo e($merchant['contact']); ?></td>
                                                <td><?php echo e($merchant['address']); ?></td>
                                                <td>
                                                    <?php if($merchant['api_user']->status === 1): ?>
                                                        Active
                                                    <?php else: ?>
                                                        Suspended
                                                    <?php endif; ?>
                                                </td>
                                                
                                                    
                                                        
                                                        
                                                        
                                                    
                                                
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Company Name</th>
                                    <th>API User</th>
                                    <th>Merchant ID</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>