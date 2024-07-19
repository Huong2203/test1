<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
      data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8"/>
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('theme/admin/assets/images/favicon.ico')); ?>">
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/css/multi-select-tag.css">

    <?php echo $__env->yieldContent('style-libs'); ?>

    <script src="<?php echo e(asset('theme/jquery-3.1.1.min.js')); ?>"></script>

    <!-- Layout config Js -->
    <script src="<?php echo e(asset('theme/admin/assets/js/layout.js')); ?>"></script>
    <!-- Bootstrap Css -->
    <link href="<?php echo e(asset('theme/admin/assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="<?php echo e(asset('theme/admin/assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="<?php echo e(asset('theme/admin/assets/css/app.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <!-- custom Css-->
    <link href="<?php echo e(asset('theme/admin/assets/css/custom.min.css')); ?>" rel="stylesheet" type="text/css"/>

    <?php echo $__env->yieldContent('styles'); ?>

    <style type="text/css">
        .ck-editor__editable_inline {
            height: 450px;
        }
    </style>
</head>

<body>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php echo $__env->make('admin.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;

    <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;

    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?php echo $__env->make('admin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>
<!--end back-to-top-->

<!--preloader-->
<div id="preloader">
    <div id="status">
        <div class="spinner-border text-primary avatar-sm" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>

<div class="customizer-setting d-none d-md-block">
    <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas"
         data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
        <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
    </div>
</div>

<script>
    const PATH_ROOT = '<?php echo e(asset('theme/admin')); ?>';
</script>
<!-- JAVASCRIPT -->
<script src="<?php echo e(asset('theme/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('theme/admin/assets/libs/simplebar/simplebar.min.js')); ?>"></script>
<script src="<?php echo e(asset('theme/admin/assets/libs/node-waves/waves.min.js')); ?>"></script>
<script src="<?php echo e(asset('theme/admin/assets/libs/feather-icons/feather.min.js')); ?>"></script>
<script src="<?php echo e(asset('theme/admin/assets/js/pages/plugins/lord-icon-2.1.0.js')); ?>"></script>
<script src="<?php echo e(asset('theme/admin/assets/js/plugins.js')); ?>"></script>
<script src="<?php echo e(asset('theme/jquery-3.1.1.min.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>
<!-- prismjs plugin -->
<script src="<?php echo e(asset('theme/admin/assets/libs/prismjs/prism.js')); ?>"></script>

<!-- App js -->
<script src="<?php echo e(asset('theme/admin/assets/js/app.js')); ?>"></script>

</body>

</html>
<?php /**PATH C:\laragon\www\WebNews\xuong-laravel-main\resources\views/admin/layouts/master.blade.php ENDPATH**/ ?>