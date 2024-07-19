<aside class="col-lg-4 sidebar-home">
                    <!-- Search -->
                    <div class="widget">
                        <h4 class="widget-title"><span>Search</span></h4>
                        <form action="<?php echo e(route('search')); ?>" class="widget-search">
                            <input class="mb-3" id="search-query" name="search" type="search"
                                   placeholder="Type &amp; Hit Enter...">
                            <i class="ti-search"></i>
                            <button type="submit" class="btn btn-primary btn-block">Search</button>
                        </form> 
                    </div>

                    <!-- Search -->

                    <div class="widget">
                        <h4 class="widget-title"><span>Never Miss A News</span></h4>
                        <form action="#!" method="post" name="mc-embedded-subscribe-form" target="_blank"
                              class="widget-search">
                            <input class="mb-3" id="search-query" name="s" type="search"
                                   placeholder="Your Email Address">
                            <i class="ti-email"></i>
                            <button type="submit" class="btn btn-primary btn-block" name="subscribe">Subscribe now
                            </button>
                            <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                <input type="text" name="b_463ee871f45d2d93748e77cad_a0a2c6d074" tabindex="-1">
                            </div>
                        </form>
                    </div>

                    <!-- tags -->
                    <div class="widget">
                        <h4 class="widget-title"><span>Tags</span></h4>
                        <ul class="list-inline widget-list-inline widget-card">
                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-inline-item"><a href=""><?php echo e($item->name); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>

                    <!-- recent post -->
                    <div class="widget">
                        <h4 class="widget-title">Recent Post</h4>
                        <?php $__currentLoopData = $articleNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- post-item -->
                            <article class="widget-card">
                                <div class="d-flex">
                                    <img class="card-img-sm" src="<?php echo e(Storage::url($item->image)); ?>">
                                    <div class="ml-3">
                                        <h5><a class="post-title" href="<?php echo e(route('articles.detail', $item->slug)); ?>"><?php echo e($item->title); ?></a></h5>
                                        <ul class="card-meta list-inline mb-0">
                                            <li class="list-inline-item mb-0">
                                                <i class="ti-calendar"></i><?php echo e(date('H:i:s', strtotime($item->created_at))); ?>

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                        </article>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <!-- Social -->
                    <div class="widget">
                        <h4 class="widget-title"><span>Social Links</span></h4>
                        <ul class="list-inline widget-social">
                            <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-github"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-youtube"></i></a></li>
                        </ul>
                    </div>
                </aside><?php /**PATH C:\laragon\www\WebNews\resources\views/client/layouts/row-justify-content-center.blade.php ENDPATH**/ ?>