
<?php $__env->startSection('content'); ?>
    <?php
    $baseURL = getBaseURL();
    $setting = getSettingsInfo();
    $base_color = '#6ab04c';
    if (isset($setting->base_color) && $setting->base_color) {
        $base_color = $setting->base_color;
    }
    ?>
    <script src="<?php echo $baseURL . 'assets/js/view/settings.js'; ?>"></script>
    <!-- Main content -->
    <section class="main-content-wrapper">
        <section class="content-header dashboard_content_header my-2">
            <h3 class="top-left-header">
                <span><?php echo app('translator')->get('index.change_profile'); ?></span>
            </h3>
        </section>

        <?php echo $__env->make('utilities.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="box-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-box">
                        <?php echo e(Form::model($user, ['route' => ['update-change-profile'], 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

                        <!-- form start -->
                        <div class="box-body">
                            <div class="row">
                                <div class="mb-3 col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('index.name'); ?> <span class="required_star">*</span></label>
                                        <input type="text" name="name"
                                            class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name"
                                            placeholder="Enter Your Name" value="<?php echo e($user->name ?? old('name')); ?>">

                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('index.email'); ?> <span class="required_star">*</span></label>
                                        <input type="text" name="email"
                                            class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email"
                                            placeholder="Enter Email Address" value="<?php echo e($user->email ?? old('email')); ?>">

                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="mb-3 col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('index.phone'); ?> <span class="required_star">*</span></label>
                                        <input type="text" name="phone_number"
                                            class="form-control <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="phone_number" placeholder="Enter Phone Number"
                                            value="<?php echo e($user->phone_number ?? old('phone_number')); ?>">

                                        <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('index.photo_instruction'); ?></label>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="hidden"
                                                        value="<?php echo e(isset($user->photo) && $user->photo ? $user->photo : ''); ?>"
                                                        name="photo_old">
                                                    <input type="file" name="photo"
                                                        class="form-control file_checker_global <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        id="photo" accept="image/png,image/jpeg,image/jpg,image/gif">

                                                </td>
                                                <td class="w_1">
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#view_photo_modal"
                                                        class="btn btn-md pull-right fit-content bg-second-btn view_modal_button ms-2"
                                                        id="photo_preview"><iconify-icon
                                                            icon="solar:eye-broken"></iconify-icon></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="row py-2">
                                <div class="col-sm-12 col-md-6 mb-2 d-flex gap-3">
                                    <button type="submit" name="submit" value="submit"
                                        class="btn bg-blue-btn"><iconify-icon
                                            icon="solar:check-circle-broken"></iconify-icon><?php echo app('translator')->get('index.submit'); ?></button>                                    
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <?php echo Form::close(); ?>

                    </div>

                </div>
            </div>

        </div>

        <div class="modal fade" id="view_photo_modal" aria-hidden="true" aria-labelledby="myModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><?php echo app('translator')->get('index.photo'); ?> </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                data-feather="x"></i></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">
                            <img class="img-fluid"
                                src="<?php echo e($baseURL); ?>uploads/user_photos/<?php echo e(isset($user->photo) && $user->photo ? $user->photo : ''); ?>"
                                id="show_id">
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-blue-btn" data-dismiss="modal"
                            data-bs-dismiss="modal"><?php echo app('translator')->get('index.close'); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script_bottom'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sbg_product\resources\views/pages/profile/change-profile.blade.php ENDPATH**/ ?>