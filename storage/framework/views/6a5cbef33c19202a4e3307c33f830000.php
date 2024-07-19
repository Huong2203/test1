<?php $__env->startSection('title'); ?>
    Danh sách Bài viết
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Danh sách Bài viết</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Bài viết</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Danh sách</h5>

                    <a href="<?php echo e(route('admin.articles.create')); ?>" class="btn btn-primary mb-3">Thêm mới</a>
                </div>
                <div class="card-body">
                    <table id="example"
                           class="table table-bordered dt-responsive nowrap table-striped"
                           style="width:100%">

                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Banner</th>
                            <th>Slug</th>
                            <th>Poster</th>
                            <th>Category</th>
                            <th>Tag</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($item->id); ?></td>
                                <td><?php echo e($item->title); ?></td>
                                <td><img src="<?php echo e(\Storage::url($item->image)); ?>" alt="" width="60px"></td>
                                <td><img src="<?php echo e(\Storage::url($item->banner)); ?>" alt="" width="60px"></td>
                                <td><?php echo e($item->slug); ?></td>
                                <td><?php echo e($item->user_name); ?></td>
                                <td><?php echo e($item->category_name); ?></td>
                                <td><?php echo e($item->tags_name != "" ? $item->tags_name : "Null"); ?></td>
                                <td>
                                    <?php switch($item->status):
                                        case ('draft'): ?>
                                            <span class="badge text-bg-dark">Draft</span>
                                            <?php break; ?>
                                        <?php case ('published'): ?>
                                            <span class="badge text-bg-success">Public</span>
                                            <?php break; ?>
                                        <?php case ('archived'): ?>
                                            <span class="badge text-bg-info">Archived</span>
                                            <?php break; ?>
                                    <?php endswitch; ?>
                                </td>
                                <td><?php echo e($item->created_at); ?></td>
                                <td><?php echo e($item->updated_at); ?></td>
                                <td>
                                    <a href="<?php echo e(route('admin.articles.show', $item->id)); ?>" class="btn btn-info mb-3">Xem</a>
                                    <a href="<?php echo e(route('admin.articles.edit', $item->id)); ?>"
                                       class="btn btn-warning mb-3">Sửa</a>

                                    <a href="<?php echo e(route('admin.articles.destroy', $item->id)); ?>"
                                       onclick="return confirm('Chắc chắn chưa?')"
                                       class="btn btn-danger mb-3">Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>

                    </table>

                    <?php echo e($data->links()); ?>


                </div>
            </div>
        </div><!--end col-->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-libs'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('theme/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\WebNews\xuong-laravel-main\resources\views/admin/articles/index.blade.php ENDPATH**/ ?>