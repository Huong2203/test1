
    <!-- navigation -->
    <header class="navigation fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-white">
                <a class="navbar-brand order-1" href="<?php echo e(route('trangchu')); ?>">
                    <img class="img-fluid" width="100px" src="<?php echo e(asset('theme/client/images/logo.png')); ?>"
                         alt="Reader | Hugo Personal Blog Template">
                </a>

                <?php echo $__env->make('client.layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="order-2 order-lg-3 d-flex align-items-center">
                    <ul class="navbar-nav mx-auto">
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <?php if(Auth::user()->type == 'admin'): ?>
                                        <a class="dropdown-item" href="<?php echo e(route('admin.dashboard')); ?>">
                                            <?php echo e(__('Quản trị viên')); ?>

                                        </a>
                                    <?php endif; ?>

                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>">
                                       <?php echo e(__('Đăng xuất')); ?>

                                    </a>
                                </div>
                            </li>
                        <?php endif; ?>
                        </ul>

                </div>

            </nav>
        </div>
    </header>
    <!-- /navigation -->



<?php /**PATH C:\laragon\www\WebNews\xuong-laravel-main\resources\views/client/layouts/header.blade.php ENDPATH**/ ?>