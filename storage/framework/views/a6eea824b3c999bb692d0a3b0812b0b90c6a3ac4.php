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
            <!-- row -->
            <div class="row">
                <div class="center p-20 col-md-2 pull-right">
                    <input type="hidden" name="date_range" value="<?php echo e(session('date_range') ?? ''); ?>">
                    <span class="hide-menu " style="display: none">
                                            <a href="" target="_blank"
                                               class="btn btn-info btn-block btn-rounded waves-effect waves-light">Download</a>
                                        </span>
                </div>

                    
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="white-box" style="text-align: center">
                        <span style="caption-side: top; font-weight: bolder; font-size: 2rem; text-transform: uppercase; ">SETTLEMENT REPORT SUMMARY  FOR <?php echo e($date->toFormattedDateString()); ?></span>
                        <div class="bluebox" style="margin-top:2rem;">
                            <div class="col-lg-3 col-md-3">
                                Volume
                                <span style="font-size: 2.5rem; color: #444; display: block;"><?php echo e($totalTransfer['volume'] + $totalPayment['volume']); ?></span>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                Amount
                                <span style="font-size: 2.5rem; color: #444; display: block;">GHS <?php echo e($totalTransfer['amount'] + $totalPayment['amount']); ?></span>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                Charges
                                <span style="font-size: 2.5rem; color: #444; display: block;">GHS <?php echo e($totalTransfer['charge'] + $totalPayment['charge']); ?></span>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                Net
                                <span style="font-size: 2.5rem; color: #444; display: block;">GHS <?php echo e($totalTransfer['net'] + $totalPayment['net']); ?></span>
                            </div>
                        </div>
                        <div class="row row-in">
                            <div class="col-lg-6 col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-hover table-striped">
                                        <thead>
                                        <caption style="caption-side: top; font-weight: bold; font-size: 2rem; padding-top:2rem;" align="bottom">Payment</caption>
                                        <tr style="text-align: center; text-transform: uppercase">
                                            <th width="100"> R-SWITCH </th>
                                            <th width="100">Volume</th>
                                            <th>AMOUNT</th>
                                            <th>CHARGES</th>
                                            <th>NET</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strtolower($detail['type'])=='payment'): ?>
                                                <tr>
                                                    <td>
                                                        <img src="<?php echo e(asset($detail['image'])); ?>" style="width: 50px; height: 30px" alt="card Symbol">
                                                        <b style="display: block;"><?php echo e($detail['name']); ?></b>
                                                    </td>
                                                    <td style="text-align: center"><?php echo e($detail['volume']); ?></td>
                                                    
                                                    <td style="text-align: center"><?php echo e($detail['amount']); ?></td>
                                                    <td style="text-align: center"><?php echo e($detail['charges']); ?></td>
                                                    <td style="text-align: center"><?php echo e($detail['net_amount']); ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <tr style="text-align: ; font-size: 1.36rem; font-weight: 700;">
                                            <td>
                                                <span style="">Totals</span>
                                            </td>
                                            <td style="">
                                                <span style="margin-left: 1.1rem !important; display: block;"> <?php echo e($totalPayment['volume']); ?></span>
                                            </td>
                                            <td style="">
                                                <span style="margin-left: 1.1rem !important; display: block;"> <?php echo e($totalPayment['amount']); ?></span>
                                            </td>
                                            <td style="">
                                                <span style="margin-left: 1.1rem !important; display: block;"> <?php echo e($totalPayment['charge']); ?></span>
                                            </td>
                                            <td style="">
                                                <span style="margin-left: 1.1rem !important; display: block;"><?php echo e($totalPayment['net']); ?></span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-hover table-striped">
                                        <thead>
                                        <caption style="caption-side: top; font-weight: bold; font-size: 2rem; padding-top:2rem;" align="bottom">Transfer</caption>
                                        <tr style="text-align: center; text-transform: uppercase">
                                            <th width="100"> R-SWITCH </th>
                                            <th width="100">Volume</th>
                                            <th>AMOUNT</th>
                                            <th>CHARGES</th>
                                            <th>NET</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $transfers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strtolower($detail['type'])=='transfer'): ?>
                                                <tr>
                                                    <td>
                                                        <img src="<?php echo e(asset($detail['image'])); ?>" style="width: 50px; height: 30px" alt="card Symbol">
                                                        <b style="display: block;"><?php echo e($detail['name']); ?></b>
                                                    </td>
                                                    <td style="text-align: center"><?php echo e($detail['volume']); ?></td>
                                                    <td style="text-align: center"><?php echo e($detail['amount']); ?></td>
                                                    <td style="text-align: center"><?php echo e($detail['charges']); ?></td>
                                                    <td style="text-align: center"><?php echo e($detail['net_amount']); ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <tr style="text-align: center; font-size: 1.36rem; font-weight: 700;">
                                            <td>
                                                <span style="">Totals</span>
                                            </td>
                                            <td style="">
                                                <span style="margin-left: 1.1rem !important; display: block;"> <?php echo e($totalTransfer['volume']); ?></span>
                                            </td>
                                            <td style="">
                                                <span style="margin-left: 1.1rem !important; display: block;"> <?php echo e($totalTransfer['amount']); ?></span>
                                            </td>
                                            <td style="">
                                                <span style="margin-left: 1.1rem !important; display: block;"> <?php echo e($totalTransfer['charge']); ?></span>
                                            </td>
                                            <td style="">
                                                <span style="margin-left: 1.1rem !important; display: block;"><?php echo e($totalTransfer['net']); ?></span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                                
                                    
                                        
                                        
                                        
                                            
                                            
                                            
                                          
                                            
                                        
                                        
                                        
                                        
                                        
                                            
                                                
                                                
                                            
                                            
                                                
                                            
                                            
                                                
                                            
                                            
                                                
                                            
                                            
                                                
                                            
                                        
                                        
                                        
                                            
                                                
                                            
                                            
                                            

                                            
                                            
                                                
                                            
                                            
                                                
                                            
                                        
                                        
                                    
                                
                            
                        </div>
                    </div>
                </div>

                
                    
                        
                            
                                
                                    

                                    
                                        
                                        
                                        
                                            
                                            
                                            
                                            
                                            
                                        
                                        
                                        
                                        
                                            
                                                
                                                    
                                                    
                                                
                                                
                                                
                                                
                                                
                                            
                                        
                                        
                                    
                                
                            
                        
                    
                

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
    <style>
        .bluebox {
            width: 100%;
            color: #fefefe;
            background-color: #03a9f4;
            height: 9rem;
            text-align: center;
            padding: 1rem;
            font-weight: 700;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>