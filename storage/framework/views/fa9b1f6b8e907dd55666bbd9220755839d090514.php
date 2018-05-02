<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Transactions
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#"><i class="fa fa-hourglass"></i> Transactions</a>
                </li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">

            <!-- Your Page Content Here -->
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Transactions</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th>STAN</th>
                                            <th>TranId</th>
                                            <th>Platform</th>
                                            <th>TranType</th>
                                            <th>Amount</th>
                                            <th>TransDate</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(isset($transactions)): ?>
                                            <?php if(count($transactions) === 0): ?>
                                                <tr role="row">
                                                    <td colspan="7" class="text-center">No Transactions found!</td>
                                                </tr>
                                            <?php else: ?>
                                                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr role="row" class="">
                                                        <td><?php echo e($transaction['msg_003']); ?></td>
                                                        <td><?php echo e($transaction['msg_002']); ?></td>
                                                        <td><?php echo e($transaction['msg_006']); ?></td>
                                                        <td><?php echo e($transaction['msg_005']); ?></td>
                                                        <td><?php echo e($transaction['msg_008']); ?></td>
                                                        <td><?php echo e($transaction['msg_018']); ?></td>
                                                        <td><?php echo e($transaction['msg_016']); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>STAN</th>
                                            <th>TranId</th>
                                            <th>Platform</th>
                                            <th>TranType</th>
                                            <th>Amount</th>
                                            <th>TransDate</th>
                                            <th>Status</th>
                                        </tr>
                                        </tfoot>
                                    </table>
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