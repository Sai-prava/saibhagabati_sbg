
<?php $__env->startSection('content'); ?>
    <?php
    $baseURL = getBaseURL();
    $setting = getSettingsInfo();
    $base_color = '#6ab04c';
    if (isset($setting->base_color) && $setting->base_color) {
        $base_color = $setting->base_color;
    }
    ?>
    <script src="<?php echo $baseURL . 'frequent_changing/js/settings.js'; ?>"></script>
    <!-- Main content -->
    <section class="main-content-wrapper">
        <section class="content-header dashboard_content_header my-2">
            <h3 class="top-left-header">
                <span><?php echo app('translator')->get('index.company_profile'); ?></span>
            </h3>
        </section>

        <?php echo $__env->make('utilities.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="box-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-box">
                        <?php echo Form::model(isset($settingsInfo) && $settingsInfo ? $settingsInfo : '', [
                            'method' => 'POST',
                            'id' => 'setting_update',
                            'enctype' => 'multipart/form-data',
                            'route' => ['setting.update'],
                        ]); ?>

                        <?php echo csrf_field(); ?>
                        <div class="box-body">
                            <div class="row">
                                <div class="mb-3 col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('index.company_name'); ?> <span class="required_star">*</span></label>
                                        <input type="text" name="name_company_name"
                                            class="form-control <?php $__errorArgs = ['name_company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="name_company_name" placeholder="Name/Business Name"
                                            value="<?php echo e(isset($settingsInfo->name_company_name) && $settingsInfo->name_company_name ? $settingsInfo->name_company_name : ''); ?>">

                                        <?php $__errorArgs = ['name_company_name'];
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
                                        <label><?php echo app('translator')->get('index.contact_person'); ?> <span class="required_star">*</span></label>
                                        <input type="text" name="contact_person"
                                            class="form-control <?php $__errorArgs = ['contact_person'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="contact_person" placeholder="Contact Person"
                                            value="<?php echo e(isset($settingsInfo->contact_person) && $settingsInfo->contact_person ? $settingsInfo->contact_person : ''); ?>">

                                        <?php $__errorArgs = ['contact_person'];
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
                                        <input type="text" name="phone"
                                            class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="phone" placeholder="Phone"
                                            value="<?php echo e(isset($settingsInfo->phone) && $settingsInfo->phone ? $settingsInfo->phone : ''); ?>">

                                        <?php $__errorArgs = ['phone'];
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
                                            placeholder="Email"
                                            value="<?php echo e(isset($settingsInfo->email) && $settingsInfo->email ? $settingsInfo->email : ''); ?>">

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
                                        <label><?php echo app('translator')->get('index.website'); ?></label>
                                        <input type="text" name="web_site"
                                            class="form-control <?php $__errorArgs = ['web_site'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="web_site"
                                            placeholder="Website"
                                            value="<?php echo e(isset($settingsInfo->web_site) && $settingsInfo->web_site ? $settingsInfo->web_site : ''); ?>">

                                        <?php $__errorArgs = ['web_site'];
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

                                <div class="mb-3 col-sm-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('index.address'); ?> <span class="required_star">*</span></label>
                                        <input type="text" name="address"
                                            class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="address"
                                            placeholder="Address"
                                            value="<?php echo e(isset($settingsInfo->address) && $settingsInfo->address ? $settingsInfo->address : ''); ?>">

                                        <?php $__errorArgs = ['address'];
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
                                        <label><?php echo app('translator')->get('index.currency'); ?> <span class="required_star">*</span></label>
                                        <input type="text" name="currency" id="currency"
                                            class="form-control <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            placeholder="Currency"
                                            value="<?php echo e(isset($settingsInfo->currency) ? $settingsInfo->currency : null); ?>">
                                        <?php $__errorArgs = ['currency'];
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
                                        <label><?php echo app('translator')->get('index.currency_position'); ?> <span class="required_star">*</span></label>
                                        <select name="currency_position"
                                            class="form-control <?php $__errorArgs = ['currency_position'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2">
                                            <option
                                                <?php echo e(isset($settingsInfo->currency_position) && $settingsInfo->currency_position == 'Before' ? 'selected' : ''); ?>

                                                value="Before">Before</option>
                                            <option
                                                <?php echo e(isset($settingsInfo->currency_position) && $settingsInfo->currency_position == 'After' ? 'selected' : ''); ?>

                                                value="After">After</option>
                                        </select>
                                        <?php $__errorArgs = ['currency_position'];
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
                                        <label><?php echo app('translator')->get('index.precision'); ?> <span class="required_star">*</span></label>
                                        <select name="precision"
                                            class="form-control <?php $__errorArgs = ['precision'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2">
                                            <option
                                                <?php echo e(isset($settingsInfo->precision) && $settingsInfo->precision == '2' ? 'selected' : ''); ?>

                                                value="2"><?php echo app('translator')->get('index.2_digit'); ?></option>
                                            <option
                                                <?php echo e(isset($settingsInfo->precision) && $settingsInfo->precision == '3' ? 'selected' : ''); ?>

                                                value="3"><?php echo app('translator')->get('index.3_digit'); ?></option>
                                        </select>
                                        <?php $__errorArgs = ['precision'];
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
                                        <label><?php echo app('translator')->get('index.decimals_separator'); ?> <span class="required_star">*</span></label>
                                        <select name="decimals_separator"
                                            class="form-control <?php $__errorArgs = ['decimals_separator'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2">
                                            <option
                                                <?php echo e(isset($settingsInfo->decimals_separator) && $settingsInfo->decimals_separator == '.' ? 'selected' : ''); ?>

                                                value="."><?php echo app('translator')->get('index.dot'); ?>(.)</option>
                                            <option
                                                <?php echo e(isset($settingsInfo->decimals_separator) && $settingsInfo->decimals_separator == ',' ? 'selected' : ''); ?>

                                                value=","><?php echo app('translator')->get('index.comma'); ?>(,)</option>
                                            <option
                                                <?php echo e(isset($settingsInfo->decimals_separator) && $settingsInfo->decimals_separator == ' ' ? 'selected' : ''); ?>

                                                value=" "><?php echo app('translator')->get('index.space'); ?></option>
                                        </select>
                                        <?php $__errorArgs = ['decimals_separator'];
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
                                        <label><?php echo app('translator')->get('index.thousands_separator'); ?> <span class="required_star">*</span></label>
                                        <select name="thousands_separator"
                                            class="form-control <?php $__errorArgs = ['thousands_separator'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2">
                                            <option
                                                <?php echo e(isset($settingsInfo->thousands_separator) && $settingsInfo->thousands_separator == '.' ? 'selected' : ''); ?>

                                                value="."><?php echo app('translator')->get('index.dot'); ?>(.)</option>
                                            <option
                                                <?php echo e(isset($settingsInfo->thousands_separator) && $settingsInfo->thousands_separator == ',' ? 'selected' : ''); ?>

                                                value=","><?php echo app('translator')->get('index.comma'); ?>(,)</option>
                                            <option
                                                <?php echo e(isset($settingsInfo->thousands_separator) && $settingsInfo->thousands_separator == ' ' ? 'selected' : ''); ?>

                                                value=" "><?php echo app('translator')->get('index.space'); ?></option>
                                        </select>
                                        <?php $__errorArgs = ['thousands_separator'];
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
                                        <label><?php echo app('translator')->get('index.timezone'); ?> <span class="required_star">*</span></label>
                                        <select class="form-control <?php $__errorArgs = ['time_zone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2"
                                            name="time_zone">
                                            <option value=""><?php echo app('translator')->get('index.select'); ?></option>
                                            <?php $__currentLoopData = $time_zone_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    <?php echo e(isset($settingsInfo) && $settingsInfo->time_zone == $value->zone_name ? 'selected' : ''); ?>

                                                    value="<?php echo e($value->zone_name); ?>"><?php echo e($value->zone_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['time_zone'];
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
                                        <label><?php echo app('translator')->get('index.date_format'); ?> <span class="required_star">*</span></label>
                                        <select class="form-control <?php $__errorArgs = ['date_format'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2"
                                            name="date_format" id="date_format">
                                            <option value=""><?php echo app('translator')->get('index.select'); ?></option>
                                            <option
                                                <?php echo e(isset($settingsInfo) && $settingsInfo->date_format == 'd/m/Y' ? 'selected' : ''); ?>

                                                value="d/m/Y">D/M/Y</option>
                                            <option
                                                <?php echo e(isset($settingsInfo) && $settingsInfo->date_format == 'm/d/Y' ? 'selected' : ''); ?>

                                                value="m/d/Y">M/D/Y</option>
                                            <option
                                                <?php echo e(isset($settingsInfo) && $settingsInfo->date_format == 'Y/m/d' ? 'selected' : ''); ?>

                                                value="Y/m/d">Y/M/D</option>
                                        </select>
                                        <?php $__errorArgs = ['date_format'];
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
                                    <div class="form-group custom_table">
                                        <label><?php echo app('translator')->get('index.logos'); ?> (<?php echo app('translator')->get('index.logo_instructions'); ?>)</label>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="hidden"
                                                            value="<?php echo e(isset($whiteLabelInfo->logo) && $whiteLabelInfo->logo ? $whiteLabelInfo->logo : ''); ?>"
                                                            name="logo_old">
                                                        <input type="file" name="logo" id="logo" class="form-control <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> file_checker_global" accept="image/png,image/jpeg,image/jpg,image/gif" data-this_file_size-limit="1">

                                                    </td>
                                                    <td class="w_1">
                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#view_logo_modal"
                                                            class="btn btn-md pull-right fit-content bg-second-btn view_modal_button ms-2"
                                                            id="logo_preview"><iconify-icon
                                                                icon="solar:eye-broken"></iconify-icon></button>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="text-danger"><?php echo e($message); ?></div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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
        </div>

        <div class="modal fade" id="view_logo_modal" aria-hidden="true" aria-labelledby="myModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><?php echo app('translator')->get('index.logo'); ?> </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                data-feather="x"></i></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">
                            <img class="img-fluid"
                                src="<?php echo e($baseURL); ?>uploads/settings/<?php echo e(isset($settingsInfo->logo) && $settingsInfo->logo ? $settingsInfo->logo : ''); ?>"
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sbg_product\resources\views/pages/settings.blade.php ENDPATH**/ ?>