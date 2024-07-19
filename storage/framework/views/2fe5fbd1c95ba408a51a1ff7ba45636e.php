

<li class="nav-item dropdown">
    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
       aria-expanded="false">
        <?php echo e($category->name); ?> <i class="ti-angle-down ml-1"></i>
    </a>

    <?php if($each != ""): ?>
        <div class="dropdown-menu">
            <a class="dropdown-item" href=""><?php echo e($each); ?><?php echo e($category->name); ?></a>
        </div>
    <?php endif; ?>
</li>

<?php if($category->children): ?>

    <?php ($each .= "-"); ?>

    <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php echo $__env->make('client.layouts.nav-category', ['category' => $child], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>
<?php /**PATH C:\laragon\www\WebNews\xuong-laravel-main\resources\views/client/layouts/nav-category.blade.php ENDPATH**/ ?>