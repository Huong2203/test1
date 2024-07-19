<?php $__env->startSection('content'); ?>

    <?php $__env->startSection('title'); ?>
        <title><?php echo e($cate->name); ?> / Reader</title>
    <?php $__env->stopSection(); ?>

    <!-- /navigation -->
    <section class="section">
        <div class="py-4"></div>
        <div class="container">
            <div class="row">
                <div
                    class="col-lg-8  mb-5 mb-lg-0">
                    <h1 class="h2 mb-4">Showing items from <mark><?php echo e($cate->name); ?></mark></h1>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <article class="card mb-4">
                            <div class="card-body">
                                <h3 class="mb-3">
                                    <a href="<?php echo e(route('categories.articles.detail', ['slug_cate' => $cate->slug, 'slug_articles' => $item->slug])); ?>">
                                        <?php echo e($item->title); ?>

                                    </a>
                                </h3>
                                <ul class="card-meta list-inline">
                                    <li class="list-inline-item">
                                        <a href="author-single.html" class="card-meta-author">
                                            <img src="<?php echo e(Storage::url($item->user->cover)); ?>">
                                            <span><?php echo e($item->user->name); ?></span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="ti-timer"></i><?php echo e(date('H:i:s', strtotime($item->created_at))); ?>

                                    </li>
                                    <li class="list-inline-item">
                                        <i class="ti-calendar"></i><?php echo e(date('d/m/Y', strtotime($item->created_at))); ?>

                                    </li>
                                    <li class="list-inline-item">
                                        <ul class="card-meta-tag list-inline">
                                            <li class="list-inline-item"><a href="tags.html"><?php echo e($item->tag->name); ?></a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <a href="post-details.html" class="btn btn-outline-primary">Read More</a>
                            </div>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <?php echo $__env->make('client.layouts.row-justify-content-center', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\WebNews\resources\views/categories.blade.php ENDPATH**/ ?>