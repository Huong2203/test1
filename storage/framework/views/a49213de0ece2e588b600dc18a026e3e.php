<?php $__env->startSection('title'); ?>
    Chỉnh sửa Danh mục
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Chỉnh sửa Danh mục</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Danh mục</a></li>
                        <li class="breadcrumb-item active">Chỉnh sửa</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <form action="<?php echo e(route('admin.categories.update', $model->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

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
                                            <div>
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" name="name" id="name" value="<?php echo e($model->name); ?>">
                                            </div>

                                            <div class="mt-3">
                                                <label for="name" class="form-label">Slug</label>
                                                <input type="text" class="form-control" name="slug" id="name" value="<?php echo e($model->slug); ?>">
                                            </div>

                                            <div class="mt-3">
                                                <label for="name" class="form-label">Description</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="description"><?php echo e($model->description); ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div>
                                                <label for="parent_id" class="form-label">Parent Category</label>
                                                <select type="text" class="form-select" name="parent_id" id="parent_id">
                                                    <option value="" selected>Trống</option>

                                                    <?php $__currentLoopData = $parentCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <?php ($each = ""); ?>

                                                        <?php echo $__env->make('admin.categories.nested-category', ['category' => $parent], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\WebNews\resources\views/admin/categories/edit.blade.php ENDPATH**/ ?>