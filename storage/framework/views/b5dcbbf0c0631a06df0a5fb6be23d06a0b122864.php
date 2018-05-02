<header class="main-header" style="background-color: white">
    <!-- Logo -->
    <a href="/" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src=""></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="<?php echo e(asset('img/pslogo.png')); ?>" width="50%"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="<?php echo e(route('logout')); ?>" class="dropdown-toggle" data-toggle="dropdown" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off"></i>
                    </a>
                </li>
                <form method="post" action="<?php echo e(route('logout')); ?>" id="logout-form">
                    <?php echo e(csrf_field()); ?>

                </form>
            </ul>
        </div>
    </nav>
</header>