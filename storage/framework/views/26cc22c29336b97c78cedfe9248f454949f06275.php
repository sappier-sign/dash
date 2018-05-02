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
                            <h3>Transactions</h3>
                        </div>

                        <div class='col-md-4'>
                            <form class="form-horizontal row" method="post" action="<?php echo e(url('transactions/filter')); ?>">
                                <?php echo e(csrf_field()); ?>

                                <div class="col-sm-12">
                                    <div class="col-sm-12 col-md-6">
                                        <select name="parameter" id="" class="form-control" required>
                                            <option value="" disabled selected>Select parameter</option>
                                            <option value="fld_037">fld_037</option>
                                            <option value="fld_057">fld_057</option>
                                            <option value="fld_002">fld_002</option>
                                            <option value="fld_012">fld_012</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class='input-group date' id='datetimepicker6'>
                                            <input type='text' name="value" placeholder="search" class="form-control"
                                                   required>
                                            <span class="input-group-addon">
                    <button type="submit"><span class="glyphicon glyphicon-search"></span></button>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <table class="table table-striped table-bordered table-responsive nowrap">
                            <thead>
                            <tr role="row">
                                <?php if( $user->role === 'master' ): ?>
                                    <th title="Merchant" class="text-center">fld_043</th>
                                <?php endif; ?>
                                <th title="System Trace Audit Number" class="text-center">fld_011</th>
                                <th title="Reference" class="text-center">fld_037</th>
                                <th title="Wallet Name" class="text-center">fld_057</th>
                                <th title="Wallet Number" class="text-center">fld_002</th>
                                <th title="Transaction Type" class="text-center">fld_003</th>
                                <th title="Transaction Amount" class="text-center">fld_004</th>
                                <th title="Transaction Date" class="text-center">fld_012</th>
                                <th title="Transaction Status" class="text-center">fld_039</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($transactions)): ?>
                                <?php if(count($transactions) === 0): ?>
                                    <tr role="row">
                                        <td colspan="8" class="text-center">No Transactions found!</td>
                                    </tr>
                                <?php else: ?>
                                    <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr role="row" class="">
                                            <?php if( $user->role === 'master' ): ?>
                                                <td class="text-center"><?php echo e($transaction['fld_043']); ?></td>
                                            <?php endif; ?>
                                            <td class="text-center"><?php echo e($transaction['fld_011']); ?></td>
                                            <td class="text-center"><?php echo e($transaction['fld_037']); ?></td>
                                            <td class="text-center">
                                                <?php echo e($transaction['fld_057']); ?>

                                            </td>
                                            <td class="text-center">
                                                <?php if($transaction['fld_003'] === '404000'): ?>
                                                    <?php echo e($transaction['user']['acc_number']); ?>

                                                <?php else: ?>
                                                    <?php echo e($transaction['fld_002']); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center"><?php echo e($transaction['fld_003']); ?></td>
                                            <td class="text-right"><?php echo e($transaction['fld_004']); ?></td>
                                            <td class="text-center"><?php echo e($transaction['fld_012']); ?></td>
                                            <?php if($transaction['fld_039'] === '000'): ?>
                                                <td class="text-center"><label for=""
                                                                               class="label label-success">success</label>
                                                </td>
                                            <?php elseif($transaction['fld_039'] === '101'): ?>
                                                <td class="text-center"><label for=""
                                                                               class="label label-warning">pending</label>
                                                </td>
                                            <?php else: ?>
                                                <td class="text-center"><label for=""
                                                                               class="label label-danger">failed</label>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr role="row">
                                <th title="System Trace Audit Number" class="text-center">fld_011</th>
                                <th title="Reference" class="text-center">fld_037</th>
                                <th title="Wallet Name" class="text-center">fld_057</th>
                                <th title="Wallet Number" class="text-center">fld_002</th>
                                <th title="Transaction Type" class="text-center">fld_003</th>
                                <th title="Transaction Amount" class="text-center">fld_004</th>
                                <th title="Transaction Date" class="text-center">fld_012</th>
                                <th title="Transaction Status" class="text-center">fld_039</th>
                            </tr>
                            </tfoot>
                        </table>
                        <?php echo e($transactions->links()); ?>

                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>