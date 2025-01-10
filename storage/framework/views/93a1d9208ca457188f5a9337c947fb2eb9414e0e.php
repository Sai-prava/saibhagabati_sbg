<nav class="navbar navbar-static-top" class="<?php echo \Illuminate\Support\Arr::toCssClasses(isset($language) && $language == 'arabic' ? 'ms-0' : '') ?>">
    <div class="wrapper_up_wrapper">
        <div class="hh_wrapper">
            <div class="navbar-custom-menu navbar-menu-left">
                <div class="menu-trigger-box ">
                    <div class="d-flex">
                        <button data-toggle="push-menu" type="button" class="st new-btn mobile_sideber_hide_show">
                            <iconify-icon icon="ri:menu-fold-fill" width="22"></iconify-icon>
                        </button>
                    </div>
                </div>
            </div>
            <div class="navbar-custom-menu navbar-menu-right">
                <div class="d-inline-flex align-items-center gap-2">
                    <!-- Language And Dropdown -->
                    <div class="dropdown language-dropdown me-2">
                        <?php
                            $language = auth()->check() && Auth::user()->language != null;
                        ?>
                        <button class="dropdown-toggle new-btn" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <?php if(auth()->check() && Auth::user()->language != null): ?>
                                <iconify-icon icon="ion:language" width="20"></iconify-icon>
                                <span
                                    class="mobile-d-ln-none"><?php echo e(lanFullName(auth()->check() ? Auth::user()->language : '')); ?></span>
                            <?php else: ?>
                                <iconify-icon icon="ion:language" width="20"></iconify-icon>
                                <span class="mobile-d-ln-none">English</span>
                            <?php endif; ?>
                        </button>
                        <ul dir="ltr"
                            class="dropdown-menu dropdown-menu-light dropdown-menu-lang language_dropdown">
                            <?php $__currentLoopData = languageFolders(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="lang_list">
                                    <a class="dropdown-item" href="<?php echo e(url('set-locale/' . $dir)); ?>">
                                        <?php echo e(lanFullName($dir)); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>

                    <!-- User Image And Dropdown -->
                    <ul class="menu-list">
                        <!-- User Profile And Dropdown -->
                        <li class="user-info-box">
                            <div class="user-profile">

                                <?php if(Auth::user()->photo != null && file_exists('uploads/user_photos/' . Auth::user()->photo)): ?>
                                    <img class="user-avatar"
                                        src="<?php echo e($baseURL); ?>uploads/user_photos/<?php echo e(auth()->user()->photo); ?>"
                                        alt="user-image">
                                <?php else: ?>
                                    <img class="user-avatar" src="<?php echo e($baseURL); ?>assets/images/avatar.png"
                                        alt="user-image">
                                <?php endif; ?>

                            </div>
                            <div class="c-dropdown-menu user_profile_active">
                                <ul>
                                    <li class="common-margin">
                                        <div>
                                            <div class="user-info d-flex align-items-center">
                                                <?php if(Auth::user()->photo != null and file_exists('uploads/user_photos/' . Auth::user()->photo)): ?>
                                                    <img class="user-avatar-inner"
                                                        src="<?php echo e($baseURL); ?>uploads/user_photos/<?php echo e(auth()->user()->photo); ?>"
                                                        alt="user-image">
                                                <?php else: ?>
                                                    <img class="user-avatar-inner"
                                                        src="<?php echo e($baseURL); ?>assets/images/avatar.png"
                                                        alt="user-image">
                                                <?php endif; ?>
                                                <div class="ps-2">
                                                    <p class="user-name mb-0 font-weight-700"><?php echo e(Auth::user()->name); ?>

                                                    </p>
                                                    <span
                                                        class="user-role user-role-second"><?php echo e(Auth::user()->designation); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li class="common-margin d-flex align-items-center">
                                        <a href="<?php echo e(url('change-profile')); ?>">
                                            <iconify-icon icon="solar:user-circle-broken" width="22"
                                                class="me-2"></iconify-icon>
                                            <?php echo app('translator')->get('index.change_profile'); ?>
                                        </a>
                                    </li>

                                    <li class="common-margin">
                                        <a href="<?php echo e(url('change-password')); ?>">
                                            <iconify-icon icon="solar:key-minimalistic-2-broken" width="22"
                                                class="me-2"></iconify-icon>
                                            <?php echo app('translator')->get('index.change_password'); ?>
                                        </a>
                                    </li>

                                    <li class="common-margin">
                                        <a href="<?php echo e(url('security-question')); ?>">
                                            <iconify-icon icon="solar:question-circle-broken" width="22"
                                                class="me-2"></iconify-icon>
                                            <?php echo app('translator')->get('index.security_question'); ?>
                                        </a>
                                    </li>

                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>

                                    <li class="common-margin">
                                        <a href="javascript:void(0)" class="logOutTrigger">
                                            <iconify-icon icon="solar:logout-broken" width="22"
                                                class="me-2"></iconify-icon>
                                            <?php echo app('translator')->get('index.logout'); ?>
                                        </a>
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                            class="d-none">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\sbg_product\resources\views/layouts/topbar.blade.php ENDPATH**/ ?>