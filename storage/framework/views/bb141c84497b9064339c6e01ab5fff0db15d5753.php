<div class="navbar-default sidebar nicescroll" role="navigation" style="margin-top: 20px">
    <div class="sidebar-nav navbar-collapse ">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                                <button class="btn btn-primary" type="button"><i class="fa fa-search"></i> </button>
                            </span>
                </div>
            </li>
            <li>
                <a href="<?php echo e(url('dashboard')); ?>" class="waves-effect"><i class="fa fa-desktop"></i> Dashboard</a>
            </li>
            
                
            
            <li>
                <a href="<?php echo e(url('transactions')); ?>" class="waves-effect"><i class="fa fa-credit-card"></i> Transactions</a>
            </li>
            <li>
                <a href="<?php echo e(url('credentials')); ?>" class="waves-effect"><i class="fa fa-ticket"></i> My Api Credentials</a>
            </li>
            <li>
                <a href="<?php echo e(url('password/change')); ?>" class="waves-effect"><i class="fa fa-key"></i> Change Password</a>
            </li>
            <?php if($user['role'] === 'master'): ?>
            <li>
                <a href="<?php echo e(url('merchants')); ?>" class="waves-effect"><i class="fa fa-users"></i> Merchants</a>
            </li>
            <?php endif; ?>
            <li>
                <a href="<?php echo e(url('reports')); ?>" class="waves-effect"><i class="fa fa-book"></i> Reports</a>
            </li>
            <li>
                <a href="<?php echo e(url('terminals')); ?>" class="waves-effect"><i class="fa fa-tablet"></i> Terminals</a>
            </li>
            <li>
                <a href="<?php echo e(url('documentations')); ?>" class="waves-effect"><i class="fa fa-file-text-o"></i> Documentation</a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>