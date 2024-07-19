<?php $__env->startSection('title'); ?>
    Xem chi tiết Danh mục: <?php echo e($model->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <table class="table table-hover" border="1">
        <tr>
            <th>Trường</th>
            <th>Giá trị</th>
        </tr>

        <?php $__currentLoopData = $model->toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($key); ?></td>
                <td>
                    <?php
                        if ($key == 'cover') {
                            $url = \Storage::url($value);

                            echo "<img src=\"$url\" alt=\"\" width=\"50px\">";

                        } elseif (\Illuminate\Support\Str::contains($key, 'is_')) {
                            echo $value
                                    ? '<span class="badge bg-primary">YES</span>'
                                          : '<span class="badge bg-danger">NO</span>';
                        } else {
                            echo $value;
                        }
                    ?>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\WebNews\resources\views/admin/categories/show.blade.php ENDPATH**/ ?>