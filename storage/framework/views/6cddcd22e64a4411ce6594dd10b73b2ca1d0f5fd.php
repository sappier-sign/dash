<?php $__env->startSection('content'); ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-12">
                    <!-- <h4 class="page-title">Welcome to My Admin</h4>
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                    </ol> -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="white-box">
                        <div class="row row-in">
                            <div class="col-lg-4 col-sm-6">
                                <div class="col-in text-center">
                                    <h5 class="text-warning">Total Transactions Today</h5>
                                    <h4><b>GH₵ <?php echo e($transactions['total_amount']); ?></b></h4>
                                    <h3 class="counter"><?php echo e($transactions['total_count']); ?></h3>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="col-in text-center b-r-none">
                                    <h5 class="text-success">Successful Transactions</h5>
                                    <h4><b>GH₵ <?php echo e($transactions['successful_amount']); ?></b></h4>
                                    <h3 class="counter"><?php echo e($transactions['successful_count']); ?></h3>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="col-in text-center">
                                    <h5 class="text-danger">Failed Transactions</h5>
                                    <h4><b>GH₵ <?php echo e($transactions['failed_amount']); ?></b></h4>
                                    <h3 class="counter"><?php echo e($transactions['failed_count']); ?></h3>
                                </div>
                            </div>
                            
                            
                            
                            
                            
                            
                            
                        </div>

                        <!-- <div id="bar-example"></div> -->
                        <div id="morris-area-chart"></div>
                    </div>

                </div>

                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="white-box">
                        <div class="row row-in">
                            <div class="col-lg-2 col-sm-4">
                                <div class="col-in text-center b-0">
                                    <img src="<?php echo e(asset('img/paymentlogos/Mtnmoney.png')); ?>" width="90">
                                    <h5><b>GH₵ <?php echo e($transactions['mtn_amount']); ?></b></h5>
                                    <h4 class="counter"><?php echo e($transactions['mtn_count']); ?></h4>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4">
                                <div class="col-in text-center b-0">
                                    <img src="<?php echo e(asset('img/paymentlogos/airtel-money-logo.png')); ?>" width="90">
                                    <h5><b>GH₵ <?php echo e($transactions['airtel_amount']); ?></b></h5>
                                    <h4 class="counter"><?php echo e($transactions['airtel_count']); ?></h4>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4">
                                <div class="col-in text-center b-0">
                                    <img src="<?php echo e(asset('img/paymentlogos/Tigocash.jpg')); ?>" width="90">
                                    <h5><b>GH₵ <?php echo e($transactions['tigo_amount']); ?></b></h5>
                                    <h4 class="counter"><?php echo e($transactions['tigo_count']); ?></h4>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4">
                                <div class="col-in text-center b-0">
                                    <img src="<?php echo e(asset('img/paymentlogos/vodafone-cash-ghana.png')); ?>" width="90">
                                    <h5><b>GH₵ <?php echo e($transactions['vodafone_amount']); ?></b></h5>
                                    <h4 class="counter"><?php echo e($transactions['vodafone_count']); ?></h4>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4">
                                <div class="col-in text-center b-0">
                                    <img src="<?php echo e(asset('img/paymentlogos/Visa_Debit_SVG_logo.jpg')); ?>" width="90">
                                    <h5><b>GH₵ <?php echo e($transactions['visa_amount']); ?></b></h5>
                                    <h4 class="counter"><?php echo e($transactions['visa_count']); ?></h4>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4">
                                <div class="col-in text-center b-0">
                                    <img src="<?php echo e(asset('img/paymentlogos/MasterCard-Logo.jpg')); ?>" width="90">
                                    <h5><b>GH₵ <?php echo e($transactions['mastercard_amount']); ?></b></h5>
                                    <h4 class="counter"><?php echo e($transactions['mastercard_count']); ?></h4>
                                </div>
                            </div>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        </div>
                    </div>
                </div>

            </div>
            <!-- row -->
            <div class="row">
                
                
                
                
                
                
                <div class="col-sm-12">
                    <div class="white-box col-sm-12">
                        <h3>Most Resent Transactions</h3>
                        <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                               aria-describedby="example1_info">
                            <thead>
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
                            </thead>
                            <tbody>
                            <?php if(isset($transactions)): ?>
                                <?php if($transactions['total_count'] == 0): ?>
                                    <tr role="row">
                                        <td colspan="8" class="text-center">No Transactions found!</td>
                                    </tr>
                                <?php else: ?>
                                    <?php $__currentLoopData = $transactions['transactions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr role="row" class="">
                                            <td class="text-center"><?php echo e($transaction['STAN']); ?></td>
                                            <td class="text-center"><?php echo e($transaction['TranId']); ?></td>
                                            <td class="text-center"><?php echo e($transaction['Platform']); ?></td>
                                            <td class="text-center">
                                                <?php if($transaction['TranType'] === '404000' && $transaction['user_acc']): ?>
                                                    <?php echo e($transaction['user_acc']); ?>

                                                <?php else: ?>
                                                    <?php echo e($transaction['Acc_Number']); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center"><?php echo e($transaction['TranType']); ?></td>
                                            <td class="text-right"><?php echo e($transaction['Amount']); ?></td>
                                            <td class="text-center"><?php echo e($transaction['TransDate']); ?></td>
                                            <?php if($transaction['Status'] === '000'): ?>
                                                <td class="text-center"><label for=""
                                                                               class="label label-success">successful</label>
                                                </td>
                                            <?php elseif($transaction['Status'] === '101' || $transaction['Status'] === 'vbv required'): ?>
                                                <td class="text-center"><label for=""
                                                                               class="label label-warning">pending</label>
                                                </td>
                                            <?php elseif($transaction['Status'] === '100'): ?>
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
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    
    
    
    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    

    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
    
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>