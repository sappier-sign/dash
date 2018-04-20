<?php $__env->startSection('content'); ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3>Reports</h3>
                        <form method="post" action="<?php echo e(url('reports/view')); ?>" class="row">
                            <?php echo e(csrf_field()); ?>

                            <div class='col-md-6'>
                                <div class="form-group">
                                    <label for="report-date-range">Select Date Range:</label>
                                    <input id='report-date-range' name="date" type='text' class="form-control text-center" />
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class="form-group">
                                    <label for=""><br></label>
                                    <label for="report-date-range"><br></label>
                                    <input type="submit" class="col-sm-12 btn btn-primary" value="generate">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3>Settlement</h3>
                        <form method="POST" action="<?php echo e(url('reports/settlement')); ?>" class="row">
                            <?php echo e(csrf_field()); ?>

                            <div class='col-md-6'>
                                <div class="form-group">
                                    <label for="report-settlement-date">Select Date Range:</label>
                                    <input id='report-settlement-date' name="date" type='text' class="form-control text-center" />
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class="form-group">
                                    <label for=""><br></label>
                                    <label for="report-date-range"><br></label>
                                    <input type="submit" class="col-sm-12 btn btn-primary" value="generate">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>