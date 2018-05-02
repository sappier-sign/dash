<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">

            <!-- Your Page Content Here -->
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?php echo e($transactions['count']); ?></h3>
                            <p>Transactions</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-calendar-outline"></i>
                        </div>
                        <a href="#" class="small-box-footer" data-toggle="modal" data-target="#dashmodal1">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    <!-- Modal -->
                    <div id="dashmodal1" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Some text in the modal.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-light-blue">
                        <div class="inner">
                            <h3><?php echo e($transactions['amount']); ?><!--<sup style="font-size: 20px">%</sup>--></h3>
                            <p>Amount</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-arrow-up-b"></i>
                        </div>
                        <a href="#" class="small-box-footer" data-toggle="modal" data-target="#dashmodal2">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    <!-- Modal -->
                    <div id="dashmodal2" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Some text in the modal.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo e($transactions['success']); ?></h3>
                            <p>Successful</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-arrow-down-b"></i>
                        </div>
                        <a href="#" class="small-box-footer" data-toggle="modal" data-target="#dashmodal3">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    <!-- Modal -->
                    <div id="dashmodal3" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Some text in the modal.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3><?php echo e($transactions['failed']); ?></h3>
                            <p>Failed</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-time-outline"></i>
                        </div>
                        <a href="#" class="small-box-footer" data-toggle="modal" data-target="#dashmodal4">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    <!-- Modal -->
                    <div id="dashmodal4" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Some text in the modal.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>

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
                                            <?php if($transactions['count'] == 0): ?>
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