<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Test Transaction
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#"><i class="fa fa-key"></i> Test Transaction</a>
                </li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-xs-12 col-md-8 col-md-offset-2">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Transaction form</h3>
                        </div>
                        <hr>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <!--Select box-->
                                    <div class="form-group">
                                        <label>Mode:</label>
                                        <select id="mode" class="form-control select2" style="width: 100%;">
                                            <option selected disabled>Select mode</option>
                                            <option value="mtn" data-mode="Mobile money">MTN</option>
                                            <option value="airtel" data-mode="Mobile money">Airtel</option>
                                            <option value="tigo" data-mode="Mobile money">Tigo</option>
                                            <option value="mastercard" data-mode="Card">Master Card</option>
                                            <option value="visa" data-mode="Card">Visa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Action:</label>
                                        <select id="action" class="form-control select2" style="width: 100%;" disabled>
                                            <option value="" selected>Select action</option>
                                            <option value="debit">debit</option>
                                            <option value="credit">credit</option>
                                            <option value="transfer">transfer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <form id="trans-form" action="" method="post" class="row">
                                <?php echo e(csrf_field()); ?>

                            </form>
                            <div id="vbv">

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