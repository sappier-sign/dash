<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>TheTeller API</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    
    
    <link rel="stylesheet" href='<?php echo e(asset('css/login.css')); ?>'>
    <!-- Latest compiled and minified CSS -->
    

</head>

<body style="background-color: #0277bd">
<div class="container">
    <div id="login" class="signin-card col-lg-offset-4 col-lg-4 col-sm-12"
         style="background-color: #eceff1; margin-top: 50px">
        <div class="logo-image text-center">
            <img src="<?php echo e(asset('img/theteller-logo-small.png')); ?>" alt="Logo" title="Logo" width="138">
        </div>
        <h1 class="display1 text-center">Login</h1>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger" role="alert">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><?php echo e($error); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
        <form action="<?php echo e(url('login')); ?>" method="post" class="" role="form">
            <?php echo e(csrf_field()); ?>

            <div id="" class="form-group">
                <input id="username" class="form-control text-center" name="email" placeholder="email" type="text"
                       size="18" alt="email" value="<?php echo e(old('email')); ?>"
                       style="background-color: transparent; box-shadow: none" required/>
            </div>
            <div id="form-login-password" class="form-group" style="margin-top: -10px">
                <input id="passwd" class="form-control text-center"
                       style="background-color: transparent; box-shadow: none" placeholder="password" name="password"
                       type="password" size="18" alt="password"
                       required>
            </div>
            <div style="margin-top: -10px">
                <button class="btn btn-block btn-info ripple-effect" type="submit" name="Submit" alt="sign in">
                    Sign in
                </button>
            </div>
        </form>
    </div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='<?php echo e(asset('js/gubja.js')); ?>'></script>
<script src='<?php echo e(asset('js/yaozl.js')); ?>'></script>
<script src='<?php echo e(asset('js/index.js')); ?>'></script>

</body>
</html>
