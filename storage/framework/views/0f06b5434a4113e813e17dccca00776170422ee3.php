
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
                <div class="center p-20 col-md-2 pull-right">
                    <input type="hidden" name="date_range" value="<?php echo e(session('date_range') ?? ''); ?>">
                                        <span class="hide-menu ">
                                            <a href="#" target="_blank"
                                               class="btn btn-info btn-block btn-rounded waves-effect waves-light">Download</a>
                                        </span>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="white-box">
                        <div class="row row-in">
                            <div class="col-lg-6 col-sm-12">
                                <div class="">
                                    <h4 class="underline">
                                        <b>Merchant Details</b>
                                    </h4>
                                    <h5>
                                        <b>Merchant Name:</b> <?php echo e($user['company']); ?></h5>
                                    <h5>
                                        <b>Merchant ID:</b> <?php echo e($user['merchant_id']); ?></h5>

                                    <!-- <h5><b>Location</b> Accra, Ghana</h5> -->
                                    <!-- <h3 class="counter">552,123</h3> -->
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="">
                                    <h4 class="">
                                        <b>Address</b>
                                    </h4>
                                    <h5> <?php echo e($user['address']); ?></h5>
                                    <h5>
                                        <b>Date:</b> 17th September 2017 - 17th October 2017</h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- row -->
                
                    
                    
                    
                    

                    
                    

                

            </div>
            <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="white-box">
                    <h3>Transactions</h3>

                    <div class="row">
                        <div class="col-lg-4 col-sm-4">
                            <div class="col-in text-center b-0">
                                <img src="<?php echo e(asset('img/paymentlogos/Mtnmoney.png')); ?>" width="90">
                                <h5>
                                    <b>GH₵ <?php echo e($transactions['mtn_amount']); ?></b>
                                </h5>
                                <h4 class="counter"><?php echo e($transactions['mtn_count']); ?></h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <div class="col-in text-center b-0">
                                <img src="<?php echo e(asset('img/paymentlogos/airtel-money-logo.png')); ?>" width="90">
                                <h5>
                                    <b>GH₵ <?php echo e($transactions['airtel_amount']); ?></b>
                                </h5>
                                <h4 class="counter"><?php echo e($transactions['airtel_count']); ?></h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <div class="col-in text-center b-0">
                                <img src="<?php echo e(asset('img/paymentlogos/Tigocash.jpg')); ?>" width="90">
                                <h5>
                                    <b>GH₵ <?php echo e($transactions['tigo_amount']); ?></b>
                                </h5>
                                <h4 class="counter"><?php echo e($transactions['tigo_count']); ?></h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <div class="col-in text-center b-0">
                                <img src="<?php echo e(asset('img/paymentlogos/vodafone-cash-ghana.png')); ?>" width="90">
                                <h5>
                                    <b>GH₵ <?php echo e($transactions['vodafone_amount']); ?></b>
                                </h5>
                                <h4 class="counter"><?php echo e($transactions['vodafone_count']); ?></h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <div class="col-in text-center b-0">
                                <img src="<?php echo e(asset('img/paymentlogos/Visa_Debit_SVG_logo.jpg')); ?>" width="90">
                                <h5>
                                    <b>GH₵ <?php echo e($transactions['visa_amount']); ?></b>
                                </h5>
                                <h4 class="counter"><?php echo e($transactions['visa_count']); ?></h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <div class="col-in text-center b-0">
                                <img src="<?php echo e(asset('img/paymentlogos/MasterCard-Logo.jpg')); ?>" width="90">
                                <h5>
                                    <b>GH₵ <?php echo e($transactions['mastercard_amount']); ?></b>
                                </h5>
                                <h4 class="counter"><?php echo e($transactions['mastercard_count']); ?></h4>
                            </div>
                        </div>
                        
                            
                                
                                
                                    
                                
                                
                            
                        
                        
                            
                                
                                
                                    
                                
                                
                            
                        
                        
                            
                                
                                
                                    
                                
                                
                            
                        
                    
                </div>
            </div>

            <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="white-box">
                    <h3>Transactions</h3>
                    <table id="example"
                           class="table table-striped table-bordered dataTable sorting_asc dt-responsive nowrap">
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
                            <?php if(count($transactions) === 0): ?>
                                <tr role="row">
                                    <td colspan="8" class="text-center">No Transactions found!</td>
                                </tr>
                            <?php else: ?>
                                <?php $__currentLoopData = $transactions['transactions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr role="row" class="">
                                        <td class="text-center"><?php echo e($transaction['fld_011']); ?></td>
                                        <td class="text-center"><?php echo e($transaction['fld_037']); ?></td>
                                        <td class="text-center"><?php echo e($transaction['fld_057']); ?></td>
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
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>