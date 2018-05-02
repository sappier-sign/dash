<?php $__env->startSection('content'); ?>


    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-sm-12">
                    <!-- <div class="white-box"> -->
                    <div class="table-responsive col-md-12 white-box">
                        <div class="col-sm-12 col-md-8 col-lg-8 white-box">
                            <h3>Terminals</h3>
                        </div>

                        <table class="table table-striped table-bordered table-responsive">
                            <thead>
                            <tr role="row">
                                <th title="System Trace Audit Number" class="text-center">Terminal ID</th>
                                <th title="Reference" class="text-center">IMEI</th>
                                <th title="Wallet Name" class="text-center">Signed Up</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($terminals)): ?>
                                <?php if(count($terminals) === 0): ?>
                                    <tr role="row">
                                        <td colspan="8" class="text-center">No Terminals found!</td>
                                    </tr>
                                <?php else: ?>
                                    <?php $__currentLoopData = $terminals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $terminal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr role="row" class="">
                                            <td class="text-center"><?php echo e($terminal['t_id']); ?></td>
                                            <td class="text-center"><?php echo e(($terminal['imei'])? $terminal['imei'] : 'N/A'); ?></td>
                                            <?php if($terminal['signed_up'] == '1'): ?>
                                                <td class="text-center"><label for=""
                                                                               class="label label-success">success</label>
                                                </td>
                                            <?php else: ?>
                                                <td class="text-center"><label for=""
                                                                               class="label label-warning">pending</label>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr role="row">
                                <th title="System Trace Audit Number" class="text-center">Terminal ID</th>
                                <th title="Reference" class="text-center">IMEI</th>
                                <th title="Wallet Name" class="text-center">Signed Up</th>
                            </tr>
                            </tfoot>
                        </table>
                        <?php echo e($terminals->links()); ?>

                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>