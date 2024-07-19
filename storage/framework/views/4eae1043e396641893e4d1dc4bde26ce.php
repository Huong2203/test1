<!DOCTYPE html>
<html lang="en-us">
<head>
    <?php echo $__env->make('client.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>

<!-- navigation -->
<?php echo $__env->make('client.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- /navigation -->

<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('client.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- JS Plugins -->
<script src="<?php echo e(asset('theme/client/plugins/jQuery/jquery.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/client/plugins/bootstrap/bootstrap.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/client/plugins/slick/slick.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/client/plugins/instafeed/instafeed.min.js')); ?>"></script>


<!-- Main Script -->
<script src="<?php echo e(asset('theme/client/js/script.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\laragon\www\WebNews\resources\views/client/layouts/app.blade.php ENDPATH**/ ?>