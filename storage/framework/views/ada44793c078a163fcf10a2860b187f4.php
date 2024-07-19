<option value="<?php echo e($category->id); ?>"><?php echo e($each); ?><?php echo e($category->name); ?></option>

<?php if($category->children): ?>

    <?php ($each .= "-"); ?>

    <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php echo $__env->make('admin.categories.nested-category', ['category' => $child], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>
<?php /**PATH C:\laragon\www\xuong-laravel-main\xuong-laravel-main\resources\views/admin/categories/nested-category.blade.php ENDPATH**/ ?>