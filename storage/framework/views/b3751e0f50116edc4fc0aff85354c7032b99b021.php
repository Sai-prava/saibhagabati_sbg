
<?php $__env->startSection('content'); ?>
    <?php
    $baseURL = getBaseURL();
    $whiteLabelInfo = getWhiteLabelInfo();
    $setting = getSettingsInfo();
    $base_color = '#6ab04c';
    if (isset($setting->base_color) && $setting->base_color) {
        $base_color = $setting->base_color;
    }
    ?>

    <section class="main-content-wrapper">
        <section class="content-header dashboard_content_header my-2">
            <h3 class="top-left-header">
                <span><?php echo app('translator')->get('index.mail_settings'); ?></span>
            </h3>
        </section>

        <?php echo $__env->make('utilities.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="box-wrapper">
            <!-- general form elements -->
            <div class="table-box">
                <!-- form start -->
                <form action="<?php echo e(route('settings.mail.update')); ?>" method="POST" enctype="multipart/form-data" id="common-form">
                    <?php echo csrf_field(); ?>
                    <div>
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-2">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('index.type'); ?></label><?php echo starSign(); ?>

                                    <select name="mail_driver" class="form-control <?php $__errorArgs = ['mail_driver'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2 mail_driver" id="mail_driver">
                                        <option <?php echo e($mail_setting_info['mail_driver'] == 'smtp' ? 'selected' : ''); ?>

                                            value="smtp"><?php echo app('translator')->get('index.SMTP'); ?></option>                                        
                                    </select>
                                </div>
                                <?php $__errorArgs = ['mail_driver'];
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

                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-2">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('index.host_address'); ?> <?php echo starSign(); ?></label>
                                    <input type="text" name="mail_host" class="form-control <?php $__errorArgs = ['mail_host'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php if(appMode() == 'demo'): ?> ******* <?php else: ?> <?php echo e($mail_setting_info['mail_host'] ?? ''); ?> <?php endif; ?>" placeholder="<?php echo app('translator')->get('index.host_address'); ?>">
                                </div>
                                <?php $__errorArgs = ['mail_host'];
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

                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-2">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('index.port_address'); ?> <?php echo starSign(); ?></label>
                                    <input type="number" name="mail_port" placeholder="<?php echo app('translator')->get('index.port_address'); ?>"
                                        class="form-control <?php $__errorArgs = ['mail_port'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php if(appMode() == 'demo'): ?> 0000 <?php else: ?> <?php echo e($mail_setting_info['mail_port'] ?? ''); ?> <?php endif; ?>">
                                </div>
                                <?php $__errorArgs = ['mail_port'];
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

                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-2">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('index.encryption'); ?> <?php echo starSign(); ?></label>
                                    <input type="text" name="mail_encryption" placeholder="<?php echo app('translator')->get('index.encryption'); ?>"
                                        class="form-control <?php $__errorArgs = ['mail_encryption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php if(appMode() == 'demo'): ?> ******* <?php else: ?> <?php echo e($mail_setting_info['mail_encryption'] ?? ''); ?> <?php endif; ?>">
                                </div>
                                <?php $__errorArgs = ['mail_encryption'];
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

                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-2">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('index.username'); ?> <?php echo starSign(); ?></label>
                                    <input type="text" name="mail_username" class="form-control <?php $__errorArgs = ['mail_username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="<?php echo app('translator')->get('index.username'); ?>"
                                        value="<?php if(appMode() == 'demo'): ?> ******* <?php else: ?> <?php echo e($mail_setting_info['mail_username'] ?? ''); ?> <?php endif; ?>">
                                </div>
                                <?php $__errorArgs = ['mail_username'];
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

                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-2">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('index.password'); ?> <?php echo starSign(); ?></label>
                                    <input type="text" name="mail_password" class="form-control <?php $__errorArgs = ['mail_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="<?php echo app('translator')->get('index.password'); ?>"
                                        value="<?php if(appMode() == 'demo'): ?> ******* <?php else: ?> <?php echo e($mail_setting_info['mail_password'] ?? ''); ?> <?php endif; ?>">
                                </div>
                                <?php $__errorArgs = ['mail_password'];
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


                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-2">
                                <div class="form-group custom_table">
                                    <label>
                                        <?php echo app('translator')->get('index.from'); ?> <?php echo starSign(); ?>

                                    </label>
                                    <table class="">
                                        <tr>
                                            <td>
                                                <input type="text" name="mail_from" class="form-control <?php $__errorArgs = ['mail_from'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    placeholder="<?php echo app('translator')->get('index.from'); ?>"
                                                    value="<?php if(appMode() == 'demo'): ?> ******* <?php else: ?> <?php echo e($mail_setting_info['mail_from'] ?? ''); ?> <?php endif; ?>">
                                            </td>
                                            <td class="w_1">
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#mail_from" class="btn btn-md pull-right fit-content bg-second-btn view_modal_button ms-2" id="logo_preview"><iconify-icon icon="solar:eye-broken"></iconify-icon></button>
                                            </td>
                                        </tr>
                                    </table>


                                </div>
                                <?php $__errorArgs = ['mail_from'];
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

                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-2">
                                <div class="form-group custom_table">
                                    <label><?php echo app('translator')->get('index.mail_fromname'); ?> <?php echo starSign(); ?></label>
                                    <table class="">
                                        <tr>
                                            <td>
                                                <input type="text" name="mail_fromname" class="form-control <?php $__errorArgs = ['mail_fromname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    placeholder="<?php echo app('translator')->get('index.mail_fromname'); ?>"
                                                    value="<?php if(appMode() == 'demo'): ?> ******* <?php else: ?> <?php echo e($mail_setting_info['from_name'] ?? ''); ?> <?php endif; ?>">
                                            </td>
                                            <td class="w_1">
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#from_name" class="btn btn-md pull-right fit-content bg-second-btn view_modal_button ms-2" id="logo_preview"><iconify-icon icon="solar:eye-broken"></iconify-icon></button>
                                            </td>
                                        </tr>
                                    </table>

                                </div>
                                <?php $__errorArgs = ['mail_fromname'];
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

                            <div class="col-sm-12 mb-2 col-md-12">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('index.api_key'); ?> <?php echo starSign(); ?></label>
                                    <input type="text" name="api_key" class="form-control <?php $__errorArgs = ['api_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="<?php echo app('translator')->get('index.api_key'); ?>"
                                        value="<?php if(appMode() == 'demo'): ?> ******* <?php else: ?> <?php echo e($mail_setting_info['api_key'] ?? ''); ?> <?php endif; ?>">
                                </div>
                                <?php $__errorArgs = ['api_key'];
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
                                <button type="submit" name="submit" value="submit" class="btn bg-blue-btn"><iconify-icon icon="solar:check-circle-broken"></iconify-icon><?php echo app('translator')->get('index.submit'); ?></button>
                            
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade" id="mail_from">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo app('translator')->get('index.from'); ?></h4>
                        <button type="button" class="btn-close close_modal_mail_from" data-bs-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true"><i data-feather="x"></i></span></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="<?php echo e($baseURL); ?>assets/images/mail_from.png" alt="" class="w-100">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="from_name">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo app('translator')->get('index.from'); ?></h4>
                        <button type="button" class="btn-close close_modal_from_name" data-bs-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true"><i data-feather="x"></i></span></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="<?php echo e($baseURL); ?>assets/images/from_name.png" alt="" class="w-100">
                    </div>
                </div>
            </div>
        </div>

    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script_bottom'); ?>
    <script src="<?php echo $baseURL . 'frequent_changing/js/whitelabel.js'; ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sbg_product\resources\views/pages/mail_setting.blade.php ENDPATH**/ ?>