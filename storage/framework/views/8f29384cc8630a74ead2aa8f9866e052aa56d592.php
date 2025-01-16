<div>
    <div class="row">
        <div class="col-sm-12 col-md-6 mb-2 col-lg-4">
            <div class="form-group">
                <label><?php echo app('translator')->get('index.date'); ?> <span class="required_star">*</span></label>
                <input type="text" name="date" id="date"
                    class="form-control <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> customDatepicker" readonly
                    placeholder="Date" value="<?php echo e(old('date')); ?>">
                <div class="text-danger date_error"></div>
            </div>
        </div>
        <div class="col-sm-12 mb-2 col-md-4">
            <div class="form-group">
                <label><?php echo app('translator')->get('index.responsible_person'); ?> <span class="required_star">*</span></label>
                <select name="responsible_person" id="res_person"
                    class="form-control <?php $__errorArgs = ['responsible_person'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2">
                    <option value=""><?php echo app('translator')->get('index.select'); ?></option>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value->id); ?>"
                            <?php echo e(isset($obj->responsible_person) && $obj->responsible_person || old('responsible_person') == $value->id ? 'selected' : ''); ?>>
                            <?php echo e($value->name); ?> (<?php echo e($value->phone_number); ?>)</option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="text-danger res_person_error"></div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-12 mb-2 col-md-4">
            <div class="form-group">
                <label><?php echo app('translator')->get('index.manufacture'); ?> <span class="required_star">*</span></label>
                <select class="form-control <?php $__errorArgs = ['manufacture'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2" id="manufacture"
                    name="manufacture">
                    <option value=""><?php echo app('translator')->get('index.select'); ?></option>
                    <?php $__currentLoopData = $manufactures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $finished_product_old = getFinishedProductInfo($value->product_id);
                        ?>
                        <option value="<?php echo e($value->id); ?>">
                            <?php echo e($finished_product_old->name); ?>(<?php echo e($value->reference_no); ?>)
                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div class="text-danger manufacture_error"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h4 class="mt-2"><?php echo app('translator')->get('index.product'); ?></h4>
            <div class="table-responsive" id="product_table">
                <table class="table">
                    <thead>
                        <th class="w-5 text-start"><?php echo app('translator')->get('index.sn'); ?></th>
                        <th class="w-30 text-start"><?php echo app('translator')->get('index.product'); ?>(<?php echo app('translator')->get('index.code'); ?>)</th>
                        <th class="w-20 text-start"><?php echo app('translator')->get('index.manufacture_qty'); ?></th>
                        <th class="w-20 text-start"><?php echo app('translator')->get('index.loss_qty'); ?><span class="required_star">*</span></th>
                        <th class="w-20 text-start"><?php echo app('translator')->get('index.loss_amount'); ?><span class="required_star">*</span>
                        </th>
                        <th class="w-5 ir_txt_center"><?php echo app('translator')->get('index.actions'); ?></th>
                    </thead>
                    <tbody class="product_body">

                    </tbody>
                </table>
            </div>
            <h4 class="mt-2"><?php echo app('translator')->get('index.raw_material'); ?></h4>
            <div class="table-responsive" id="rm_table">
                <table class="table">
                    <thead>
                        <th class="w-5 text-start"><?php echo app('translator')->get('index.sn'); ?></th>
                        <th class="w-30 text-start"><?php echo app('translator')->get('index.raw_materials'); ?>(<?php echo app('translator')->get('index.code'); ?>)</th>
                        <th class="w-20 text-start"><?php echo app('translator')->get('index.manufacture_qty'); ?></th>
                        <th class="w-20 text-start"><?php echo app('translator')->get('index.loss_qty'); ?><span class="required_star">*</span></th>
                        <th class="w-20 text-start"><?php echo app('translator')->get('index.loss_amount'); ?><span class="required_star">*</span>
                        </th>
                        <th class="w-5 ir_txt_center"><?php echo app('translator')->get('index.actions'); ?></th>
                    </thead>
                    <tbody class="rm_body">

                    </tbody>
                </table>
            </div>
        </div>
        <div class="clearfix"></div><br>

        <div class="row">
            <div class="col-md-4">
                <label><?php echo app('translator')->get('index.note'); ?></label>
                <textarea name="note" id="note" class="form-control <?php $__errorArgs = ['note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Note"
                    rows="3"></textarea>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-3">
                <label><?php echo app('translator')->get('index.total_loss'); ?> <span class="required_star">*</span></label>
                <div class="input-group">
                    <input type="text" name="grand_total" id="grand_total"
                        class="form-control <?php $__errorArgs = ['grand_total'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" readonly placeholder="G.Total">
                    <span class="input-group-text">
                        <?php echo e($setting->currency); ?>

                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-sm-12 col-md-6 mb-2 d-flex gap-3">
            <button type="submit" name="submit" value="submit" class="btn bg-blue-btn"><iconify-icon
                    icon="solar:check-circle-broken"></iconify-icon><?php echo app('translator')->get('index.submit'); ?></button>
            <a class="btn bg-second-btn" href="<?php echo e(route('production-loss-report')); ?>"><iconify-icon
                    icon="solar:round-arrow-left-broken"></iconify-icon><?php echo app('translator')->get('index.back'); ?></a>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\saibhagabati\resources\views/pages/production_loss/_form.blade.php ENDPATH**/ ?>