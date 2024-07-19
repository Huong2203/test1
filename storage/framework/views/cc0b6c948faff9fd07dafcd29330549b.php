<?php $__env->startSection('title'); ?>
    Thêm mới Tài khoản
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Thêm mới Tài khoản</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tài khoản</a></li>
                        <li class="breadcrumb-item active">Thêm mới</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.users.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Thông tin</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="text-center">
                                                <img id="avatarImage" src=""
                                                     class="rounded avatar-xxl" alt="Ảnh đại diện" width="50%">
                                            </div>
                                            <div class="text-center mt-5">
                                                <input type="file" name="cover" id="avatarInput">
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div>
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" name="name" id="name">
                                            </div>

                                            <div class="mt-3">
                                                <label for="name" class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" id="name">
                                            </div>

                                            <div class="mt-3">
                                                <label for="name" class="form-label">Password</label>
                                                <input type="password" class="form-control" name="password" id="name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </div><!-- end card header -->
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>

    </form>
    
    <script>
        const avatarInput = document.getElementById('avatarInput');
        const avatarImage = document.getElementById('avatarImage');

        avatarInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                avatarImage.src = e.target.result;
            }

            reader.readAsDataURL(file);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\WebNews\xuong-laravel-main\resources\views/admin/users/create.blade.php ENDPATH**/ ?>