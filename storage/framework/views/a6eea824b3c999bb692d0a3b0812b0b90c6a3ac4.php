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
                    <span class="hide-menu ">
                                            <a href="" target="_blank"
                                               class="btn btn-info btn-block btn-rounded waves-effect waves-light">Download</a>
                                        </span>
                </div>

                    
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="white-box">
                        <div class="row row-in">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-hover table-striped">
                                        <thead>
                                        <caption style="caption-side: top; font-weight: bold; font-size: 1.8rem;" align="bottom">SETTLEMENTS SUMMARY  FOR <?php echo e($date->toFormattedDateString()); ?></caption>
                                        <tr style="text-align: center">
                                            <th width="250"> R-SWITCH </th>
                                            <th width="150">NO. OF TRANSACTIONS</th>
                                            <th>TOTAL AMOUNT</th>
                                            <th>CHARGES</th>
                                            <th>NET AMOUNT</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $switches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $switch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr style="text-align: right">
                                            <td style="text-align: left">
                                                <img src="<?php echo e(asset($switch['image'])); ?>" style="width: 50px; height: 30px" alt="card Symbol">
                                                <b><?php echo e($switch['name']); ?></b>
                                            </td>
                                            <td>
                                                <?php echo e($switch['transaction_count']); ?>

                                            </td>
                                            <td>
                                                <?php echo e($switch['transaction_amount']); ?>

                                            </td>
                                            <td>
                                                <?php echo e($switch['charges']); ?>

                                            </td>
                                            <td>
                                                <?php echo e($switch['net_amount']); ?>

                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="white-box">
                        <div class="row row-in">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="table-responsive">
                                    <!-- 2nd Table added -->

                                    <table class="table table-condensed table-hover table-striped">
                                        <thead>
                                        <caption style="caption-side: top; font-weight: bold; font-size: 1.8rem;" align="bottom">SETTLEMENT DETAILS</caption>
                                        <tr>
                                            <th width="250">R-SWITCH</th>
                                            <th>NO. TRANSACTIONS</th>
                                            <th>TYPE</th>
                                            <th>TOTAL AMOUNT</th>
                                            <th>NET AMOUNT</th>
                                            
                                                
                                            
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <img src="<?php echo e(asset($detail['image'])); ?>" style="width: 50px; height: 30px" alt="card Symbol">
                                                    <b><?php echo e($detail['name']); ?></b>
                                                </td>
                                                <td><?php echo e($detail['volume']); ?></td>
                                                <td><?php echo e($detail['type']); ?></td>
                                                <td><?php echo e($detail['amount']); ?></td>
                                                <td><?php echo e($detail['net_amount']); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                        
                                        
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                        
                                        
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                        
                                        
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                        
                                        
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                        
                                        
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                        
                                        
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                        
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
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>