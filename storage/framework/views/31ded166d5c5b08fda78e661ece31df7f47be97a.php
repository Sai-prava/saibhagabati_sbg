
<?php $__env->startSection('content'); ?>
    <?php
    $baseURL = getBaseURL();
    $setting = getSettingsInfo();
    $base_color = '#6ab04c';
    if (isset($setting->base_color) && $setting->base_color) {
        $base_color = $setting->base_color;
    }
    ?>

    <!-- Main content -->
    <section class="main-content-wrapper">
        <?php echo $__env->make('utilities.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <section class="content-header">
            <h3 class="top-left-header">
                <?php echo app('translator')->get('index.tax_settings'); ?>
            </h3>

        </section>

        <div class="box-wrapper">
            <div class="table-box">

                <?php echo Form::model(isset($tax_items) && $tax_items ? $tax_items : '', [
                    'method' => 'POST',
                    'id' => 'tax_update',
                    'route' => ['tax.update'],
                ]); ?>

                <?php echo csrf_field(); ?>
                <div>
                    <div class="row">
                        <div class="col-sm-12 mb-2 col-sm-12 col-md-6">
                            <div class="form-group radio_button_problem">
                                <label><?php echo app('translator')->get('index.collect_tax'); ?> <span class="required_star">*</span></label>
                                <div class="radio">
                                    <label>
                                        <input tabindex="1" type="radio" name="collect_tax" id="collect_tax_yes"
                                            value="Yes" <?php if(isset($tax_items) && $tax_items->collect_tax == 'Yes'): echo 'checked'; endif; ?>><?php echo app('translator')->get('index.yes'); ?>
                                    </label>
                                    <label>
                                        <input tabindex="2" type="radio" name="collect_tax" id="collect_tax_no"
                                            value="No" <?php if(isset($tax_items) && $tax_items->collect_tax == 'No' || isset($tax_items) && ($tax_items->collect_tax != 'Yes' && $tax_items->collect_tax != 'No')): echo 'checked'; endif; ?>><?php echo app('translator')->get('index.no'); ?>
                                    </label>
                                </div>
                            </div>
                            <?php $__errorArgs = ['collect_tax'];
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
                    <div class="row">
                        <div class="col-md-3 tax_yes_section <?php if(isset($tax_items) && $tax_items->collect_tax == 'Yes'): ?> d-block; <?php else: ?> d-none; <?php endif; ?>">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('index.tax_registration_number'); ?> <span class="required_star">*</span></label>
                                <input type="text" name="tax_registration_number" id="tax_registration_number"
                                    class="form-control <?php $__errorArgs = ['tax_registration_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="<?php echo e(__('index.tax_registration_number')); ?>"
                                    value="<?php echo e(isset($tax_items->tax_registration_number) ? $tax_items->tax_registration_number : null); ?>">
                                <?php $__errorArgs = ['tax_registration_number'];
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

                        <div class="col-md-3 tax_yes_section <?php if(isset($tax_items) && $tax_items->collect_tax == 'Yes'): ?> d-block; <?php else: ?> d-none; <?php endif; ?>">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('index.tax_type'); ?> <span class="required_star">*</span></label>

                                <select name="tax_type" id="tax_type"
                                    class="form-control <?php $__errorArgs = ['tax_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2"
                                    placeholder="<?php echo e(__('index.tax_type')); ?>">
                                    <option value="Inclusive" <?php if(isset($tax_items) && $tax_items->tax_type == 'Inclusive'): echo 'selected'; endif; ?>><?php echo e(__('index.inclusive_tax')); ?></option>
                                    <option value="Exclusive" <?php if(isset($tax_items) && $tax_items->tax_type == 'Exclusive'): echo 'selected'; endif; ?>><?php echo e(__('index.exclusive_tax')); ?></option>
                                </select>
                                <?php $__errorArgs = ['tax_type'];
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

                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group tax_yes_section <?php if(isset($tax_items) && $tax_items->collect_tax == 'Yes'): ?> d-block; <?php else: ?> d-none; <?php endif; ?>">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="width_1_p"><?php echo app('translator')->get('index.sn'); ?></th>
                                                <th class="width_20_p"><?php echo app('translator')->get('index.tax_name'); ?></th>
                                                <th class="width_20_p"><?php echo app('translator')->get('index.tax_rate'); ?></th>
                                                <th class="width_1_p ir_txt_center"></th>
                                                <th class="width_1_p ir_txt_center"><span id="remove_all_taxes"
                                                        class="txt-uh-72"><?php echo app('translator')->get('index.actions'); ?></span></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tax_table_body">
                                            <?php
                                            $show_tax_row = '';
                                            if (isset($taxes) && count($taxes) > 0) {
                                                foreach ($taxes as $single_tax) {
                                                    $show_tax_row .= '<tr class="tax_single_row">';
                                                    $show_tax_row .= '<td class="set_sn ir_txt_center align-middle"></td>';
                                                    $show_tax_row .= '<td><input type="hidden" name="p_tax_id[]" value="' . $single_tax->id . '" /> <input type="text" onfocus="select()"  name="taxes[]" class="form-control" value="' . $single_tax->tax . '"/></td>';
                                                    $show_tax_row .= '<td><input type="text" onfocus="select()" name="tax_rate[]" class="form-control" value="' . $single_tax->tax_rate . '" /></td>';
                                                    $show_tax_row .= '<td class="align-middle">%</td>';
                                                    $show_tax_row .= '<td class="align-middle ir_txt_center"><span class="remove_this_tax_row txt-uh-72 dlt_button"><iconify-icon icon="solar:trash-bin-minimalistic-broken"></iconify-icon></span></td>';
                                                    $show_tax_row .= '</tr>';
                                                }
                                            }
                                            
                                            echo $show_tax_row;
                                            ?>
                                        </tbody>
                                    </table>
                                    <button id="add_tax" class="btn bg-blue-btn"
                                        type="button"><?php echo app('translator')->get('index.add_more'); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-sm-12 col-md-6 mb-2 d-flex gap-3">
                            <button type="submit" name="submit" value="submit" class="btn bg-blue-btn"><iconify-icon
                                    icon="solar:check-circle-broken"></iconify-icon><?php echo app('translator')->get('index.submit'); ?></button>
                        </div>

                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo $baseURL . 'frequent_changing/js/taxes.js'; ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sbg_product\resources\views/pages/taxes.blade.php ENDPATH**/ ?>