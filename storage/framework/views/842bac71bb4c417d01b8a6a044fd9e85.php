<?php $__env->startSection('title'); ?>
    Danh sách Danh mục
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Tài khoản</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Tài khoản</li>
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

                    <a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-primary mb-3">Thêm mới</a>
                </div>
                <div class="card-body">
                    <table id="example"
                           class="table table-bordered dt-responsive nowrap table-striped"
                           style="width:100%">

                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Cover</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($item->id); ?></td>
                                <td><?php echo e($item->name); ?></td>
                                <td><img src="<?php echo e(\Storage::url($item->cover)); ?>" alt="" width="70px"></td>
                                <td><?php echo e($item->email); ?></td>
                                <td><span class="badge text-bg-info"><?php echo e($item->type); ?></span></td>
                                <td><?php echo e($item->created_at); ?></td>
                                <td><?php echo e($item->updated_at); ?></td>
                                <td>
                                    <a href="<?php echo e(route('admin.users.show', $item->id)); ?>" class="btn btn-info mb-3">Xem</a>
                                    <a href="<?php echo e(route('admin.users.edit', $item->id)); ?>"
                                       class="btn btn-warning mb-3">Sửa</a>

                                    <a href="<?php echo e(route('admin.users.destroy', $item->id)); ?>"
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

<?php $__env->startSection('style-libs'); ?>
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"/>
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css"/>

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-libs'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--datatable js-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>







<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\WebNews\xuong-laravel-main\resources\views/admin/users/index.blade.php ENDPATH**/ ?>