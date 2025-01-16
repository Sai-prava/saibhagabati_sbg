

<?php $__env->startSection('script_top'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php
    $setting = getSettingsInfo();
    $tax_setting = getTaxInfo();
    $baseURL = getBaseURL();
    ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo $baseURL . 'assets/bower_components/gantt/css/style.css'; ?>">
    <link rel="stylesheet" href="<?php echo e($baseURL . 'assets/bower_components/jquery-ui/jquery-ui.css'); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <input type="hidden" id="edit_mode" value="<?php echo e(isset($obj) && $obj ? $obj->id : null); ?>">
    <section class="main-content-wrapper">
        <?php echo $__env->make('utilities.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <section class="content-header">
            <h3 class="top-left-header">
                <?php echo e(isset($title) && $title ? $title : ''); ?>

            </h3>
        </section>

        <div class="box-wrapper">
            <!-- general form elements -->
            <div class="table-box">
                <!-- form start -->
                <?php echo Form::model(isset($obj) && $obj ? $obj : '', [
                    'id' => 'manufacture_form',
                    'method' => isset($obj) && $obj ? 'PATCH' : 'POST',
                    'enctype' => 'multipart/form-data',
                    'route' => ['productions.update', isset($obj->id) && $obj->id ? $obj->id : ''],
                ]); ?>

                <?php echo csrf_field(); ?>
                <?php echo Form::hidden('stage_counter', null, ['class' => 'stage_counter', 'id' => 'stage_counter']); ?>

                <?php echo Form::hidden('stage_name', null, ['class' => 'stage_name', 'id' => 'stage_name']); ?>

                <div>
                    <div class="row">
                        <div class="col-sm-12 mb-2 col-md-4">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('index.reference_no'); ?> <span class="required_star">*</span></label>
                                <input type="text" name="reference_no" id="code"
                                    class="check_required form-control <?php $__errorArgs = ['reference_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="Reference No"
                                    value="<?php echo e(isset($obj->reference_no) ? $obj->reference_no : $ref_no); ?>"
                                    onfocus="select()">
                                <div class="text-danger d-none"></div>
                                <?php $__errorArgs = ['reference_no'];
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

                        <div class="col-sm-12 mb-2 col-md-4">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('index.manufacture_type'); ?> <span class="required_star">*</span></label>
                                <?php if(isset($obj->manufacture_type) && getManufactureType($obj->manufacture_type) !== ''): ?>
                                    <input type="hidden" name="manufacture_type" value="<?php echo e($obj->manufacture_type); ?>">
                                    <input type="text"
                                        class="form-control <?php $__errorArgs = ['manufacture_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> check_required"
                                        id="manufactures" value="<?php echo e(getManufactureType($obj->manufacture_type)); ?>" readonly>
                                <?php else: ?>
                                    <select class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2 check_required"
                                        name="manufacture_type" id="manufactures">
                                        <option value=""><?php echo app('translator')->get('index.select'); ?></option>
                                        <option
                                            <?php echo e((isset($obj->manufacture_type) && $obj->manufacture_type == 'ime') || old('manufacture_type') == 'ime' ? 'selected' : ''); ?>

                                            value="ime"><?php echo app('translator')->get('index.instant_manufacture_entry'); ?></option>
                                        <option
                                            <?php echo e((isset($obj->manufacture_type) && $obj->manufacture_type == 'mbs') || old('manufacture_type') == 'mbs' ? 'selected' : ''); ?>

                                            value="mbs"><?php echo app('translator')->get('index.manufacture_by_scheduling'); ?></option>
                                        <option
                                            <?php echo e((isset($obj->manufacture_type) && $obj->manufacture_type == 'fco') || old('manufacture_type') == 'fco' ? 'selected' : ''); ?>

                                            value="fco"><?php echo app('translator')->get('index.from_customer_order'); ?></option>
                                    </select>
                                <?php endif; ?>
                                <div class="text-danger d-none"></div>
                                <?php $__errorArgs = ['manufacture_type'];
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

                        <div class="col-sm-12 mb-2 col-md-4">
                            <input type="hidden" name="previous_status"
                                value=<?php echo e(isset($obj->manufacture_status) ? $obj->manufacture_status : null); ?>>
                            <input type="hidden" name="previous_quantity"
                                value="<?php echo e(isset($obj->product_quantity) ? $obj->product_quantity : null); ?>">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('index.status'); ?> <span class="required_star">*</span></label>
                                <select
                                    class="form-control <?php $__errorArgs = ['manufacture_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2 check_required"
                                    name="manufacture_status" id="m_status">
                                    <option value=""><?php echo app('translator')->get('index.select'); ?></option>
                                    <option
                                        <?php echo e((isset($obj->manufacture_status) && $obj->manufacture_status == 'draft') || old('manufacture_status') == 'draft' ? 'selected' : ''); ?>

                                        value="draft"><?php echo app('translator')->get('index.draft'); ?></option>
                                    <option
                                        <?php echo e((isset($obj->manufacture_status) && $obj->manufacture_status == 'inProgress') || old('manufacture_status') == 'inProgress' ? 'selected' : ''); ?>

                                        value="inProgress"><?php echo app('translator')->get('index.in_progress'); ?></option>
                                    <option
                                        <?php echo e((isset($obj->manufacture_status) && $obj->manufacture_status == 'done') || old('manufacture_status') == 'done' ? 'selected' : ''); ?>

                                        value="done"><?php echo app('translator')->get('index.done'); ?></option>
                                </select>
                                <div class="text-danger d-none"></div>
                                <?php $__errorArgs = ['manufacture_status'];
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

                        <div class="clearfix"></div>

                        <div class="col-sm-12 col-md-6 mb-2 col-lg-4">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('index.start_date'); ?> <span class="required_star">*</span></label>
                                <input type="text" name="start_date_m" id="start_date"
                                    class="form-control <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> customDatepicker" readonly
                                    placeholder="Start Date"
                                    value="<?php echo e(isset($obj->start_date) ? $obj->start_date : old('start_date')); ?>">
                                <div class="text-danger d-none"></div>
                                <?php $__errorArgs = ['start_date'];
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

                        <div class="col-sm-12 col-md-6 mb-2 col-lg-4">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('index.complete_date'); ?> </label>
                                <input type="text" name="complete_date_m" id="complete_date"
                                    class="form-control <?php $__errorArgs = ['complete_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> customDatepicker"
                                    placeholder="Complete Date"
                                    value="<?php echo e(isset($obj->complete_date) && $obj->complete_date != null ? $obj->complete_date : old('complete_date')); ?>">
                                <div class="text-danger d-none"></div>
                                <?php $__errorArgs = ['complete_date'];
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

                        <div class="clearfix"></div>

                        <div id="customer_order_area" class="row"></div>

                        <div class="clearfix"></div>
                        <?php $st_method = ''; ?>
                        <div class="col-sm-12 mb-2 col-md-4">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('index.product'); ?> <span class="required_star">*</span></label>
                                <?php if(isset($obj->product_id) && $obj->product_id !== ''): ?>
                                    <input type="hidden" name="product_id" value="<?php echo e($obj->product_id); ?>">
                                    <input type="text"
                                        class="form-control <?php $__errorArgs = ['product_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> check_required"
                                        id="fproduct_id" value="<?php echo e(getProductNameById($obj->product_id)); ?>" readonly>
                                    <?php
                                    if (isset($obj->product_id) && $obj->product_id) {
                                        $st_method = $obj->product->stock_method;
                                    }
                                    ?>
                                <?php else: ?>
                                    <select
                                        class="form-control <?php $__errorArgs = ['product_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2 fproduct_id check_required"
                                        name="product_id" id="fproduct_id">
                                        <option value=""><?php echo app('translator')->get('index.select'); ?></option>
                                        <?php if(isset($manufactures) && $manufactures): ?>
                                            <?php $__currentLoopData = $manufactures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    <?php echo e(isset($obj->product_id) && $obj->product_id == $value->id ? 'selected' : ''); ?>

                                                    value="<?php echo e($value->id . '|' . $value->stock_method); ?>">
                                                    <?php echo e($value->name); ?>(<?php echo e($value->code); ?>)</option>
                                                <?php
                                                if (isset($obj->product_id) && $obj->product_id == $value->id) {
                                                    $st_method = $value->stock_method;
                                                }
                                                ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                <?php endif; ?>
                                <div class="text-danger d-none"></div>
                                <?php $__errorArgs = ['product_id'];
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


                        <div class="col-sm-12 mb-2 col-md-2">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('index.quantity'); ?> <span class="required_star">*</span></label>
                                <input type="number" name="product_quantity" id="product_quantity"
                                    class="check_required form-control <?php $__errorArgs = ['product_quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> product_quantity"
                                    placeholder="Quantity"
                                    value="<?php echo e(isset($obj->product_quantity) ? $obj->product_quantity : old('product_quantity')); ?>"
                                    <?php echo e(isset($obj->product_quantity) ? 'readonly' : ''); ?>>
                                <div class="text-danger d-none"></div>
                                <?php $__errorArgs = ['product_quantity'];
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

                        <div
                            class="col-sm-12 mb-2 col-md-2 none_method fefo_method <?php if(in_array($st_method, ['none', 'fifo', 'fefo'])): ?> d-none <?php endif; ?>">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('index.batch_no'); ?></label>
                                <input type="text" name="batch_no" id="batch_no"
                                    class="form-control <?php $__errorArgs = ['batch_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Batch No"
                                    value="<?php echo e(isset($obj->batch_no) ? $obj->batch_no : old('batch_no')); ?>">
                                <div class="text-danger d-none"></div>
                                <?php $__errorArgs = ['batch_no'];
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

                        <div
                            class="col-sm-12 mb-2 col-md-2 none_method batch_method <?php if(in_array($st_method, ['none', 'batchcontrol', 'fifo'])): ?> d-none <?php endif; ?>">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('index.expiry_days'); ?> <span class="required_star">*</span></label>
                                <input type="text" name="expiry_days" id="expiry_days"
                                    class="form-control <?php $__errorArgs = ['expiry_days'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="Expiry Days"
                                    value="<?php echo e(isset($obj->expiry_days) ? $obj->expiry_days : old('expiry_days')); ?>">
                                <div class="text-danger d-none"></div>
                                <?php $__errorArgs = ['expiry_days'];
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
                        <input type="hidden" name="st_method" id="st_method">
                        <div class="col-sm-12 mb-2 col-md-2">
                            <div class="form-group">
                                <button id="pr_go"
                                    class="btn bg-blue-btn w-100 goBtn govalid <?php echo e(isset($obj) ? 'disabled' : ''); ?>"><span
                                        class="me-2"><?php echo app('translator')->get('index.go'); ?></span> <iconify-icon
                                        icon="solar:arrow-right-broken"></iconify-icon></button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="row <?php echo e(isset($obj) ? '' : 'hidden_sec'); ?>">
                        <div class="col-md-12">
                            <h4 class="mb-0"><?php echo app('translator')->get('index.raw_material_consumption_cost'); ?> (BoM)</h4>
                            <div class="table-responsive" id="fprm">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="w-5 text-start"><?php echo app('translator')->get('index.sn'); ?></th>
                                            <th class="w-30"><?php echo app('translator')->get('index.raw_materials'); ?>(<?php echo app('translator')->get('index.code'); ?>)</th>
                                            <th class="w-20"> <?php echo app('translator')->get('index.rate_per_unit'); ?> <span class="required_star">*</span> <i
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="<?php echo app('translator')->get('index.rm_stock_price_calculate'); ?>"
                                                    class="fa fa-question-circle base_color c_pointer"></i>
                                            </th>
                                            <th class="w-20"> <?php echo app('translator')->get('index.consumption'); ?> <span class="required_star">*</span>
                                            </th>
                                            <th class="w-20"><?php echo app('translator')->get('index.total_cost'); ?></th>
                                            <th class="w-5 text-end"><?php echo app('translator')->get('index.actions'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody class="add_trm">
                                        <?php if(isset($m_rmaterials) && $m_rmaterials): ?>
                                            <?php $__currentLoopData = $m_rmaterials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="rowCount" data-id="<?php echo e($value->rmaterials_id); ?>">
                                                    <td class="width_1_p text-start">
                                                        <p class="set_sn"></p>
                                                    </td>
                                                    <td><input type="hidden" value="<?php echo e($value->rmaterials_id); ?>"
                                                            name="rm_id[]">
                                                        <span><?php echo e(getRMName($value->rmaterials_id)); ?></span>
                                                    </td>

                                                    <td>
                                                        <div class="input-group">
                                                            <input type="number" tabindex="5" name="unit_price[]"
                                                                onfocus="this.select();"
                                                                class="check_required form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> integerchk unit_price_c cal_row"
                                                                placeholder="Unit Price" value="<?php echo e($value->unit_price); ?>"
                                                                id="unit_price_1">
                                                            <span class="input-group-text">
                                                                <?php echo e($setting->currency); ?></span>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="input-group">
                                                            <input type="number" data-countid="1" tabindex="51"
                                                                id="qty_1" name="quantity_amount[]"
                                                                onfocus="this.select();"
                                                                class="check_required form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> integerchk  qty_c cal_row"
                                                                value="<?php echo e($value->consumption); ?>"
                                                                placeholder="Consumption">
                                                            <span
                                                                class="input-group-text"><?php echo e(getManufactureUnitByRMID($value->rmaterials_id)); ?></span>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="input-group">
                                                            <input type="number" id="total_1" name="total[]"
                                                                class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> total_c"
                                                                value="<?php echo e($value->consumption_unit); ?>"
                                                                placeholder="Total" readonly="">
                                                            <span class="input-group-text">
                                                                <?php echo e($setting->currency); ?></span>
                                                        </div>
                                                    </td>
                                                    <td class="text-end"><a
                                                            class="btn btn-xs del_row dlt_button"><iconify-icon
                                                                icon="solar:trash-bin-minimalistic-broken"></iconify-icon></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                <button id="fprmaterial" class="btn bg-blue-btn w-20 mt-2"
                                    type="button"><?php echo app('translator')->get('index.add_more'); ?></button>
                            </div>
                        </div>
                    </div>

                    <div class="row <?php echo e(isset($obj) ? '' : 'hidden_sec'); ?>">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="w-5"></td>
                                        <td class="w-30"></td>
                                        <td class="w-20">
                                        </td>
                                        <td class="w-20"></td>
                                        <td class="w-20">
                                            <label class="custom_label"><?php echo app('translator')->get('index.total_raw_material_cost'); ?></label>
                                            <div class="input-group">
                                                <input type="text" name="mrmcost_total" id="rmcost_total"
                                                    class="form-control <?php $__errorArgs = ['mrmcost_total'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    readonly placeholder="<?php echo e(__('index.total_raw_material_cost')); ?>"
                                                    value="<?php echo e(isset($obj->mrmcost_total) ? $obj->mrmcost_total : old('mrmcost_total')); ?>">
                                                <span class="input-group-text"><?php echo e($setting->currency); ?></span>
                                            </div>
                                        </td>
                                        <td class="w-5 ir_txt_center"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row <?php echo e(isset($obj) ? '' : 'hidden_sec'); ?>">
                        <div class="clearfix"></div>
                        <h4 class="mb-0"><?php echo app('translator')->get('index.non_inventory_cost'); ?></h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive" id="purchase_cart">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="w-5 text-start"><?php echo app('translator')->get('index.sn'); ?></th>
                                                <th class="w-30"><?php echo app('translator')->get('index.non_inventory_items'); ?></th>
                                                <th class="w-20"></th>
                                                <th class="w-20"> <?php echo app('translator')->get('index.non_inventory_item_cost'); ?> <span
                                                        class="required_star">*</span> </th>
                                                <th class="w-20"> <?php echo app('translator')->get('index.account'); ?> <span
                                                        class="required_star">*</span></th>
                                                <th class="w-5 text-end"><?php echo app('translator')->get('index.actions'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody class="add_tnoni">
                                            <?php if(isset($m_nonitems) && $m_nonitems): ?>
                                                <?php $__currentLoopData = $m_nonitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr class="rowCount1" data-id="<?php echo e($value->noninvemtory_id); ?>">
                                                        <td class="width_1_p text-start">
                                                            <p class="set_sn1"></p>
                                                        </td>
                                                        <td><input type="hidden" value="<?php echo e($value->noninvemtory_id); ?>"
                                                                name="noniitem_id[]">
                                                            <span><?php echo e(getNonInventroyItem($value->noninvemtory_id)); ?></span>
                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="number" id="total_1" name="total_1[]"
                                                                    class="cal_row  form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> aligning total_c1"
                                                                    onfocus="select();" value="<?php echo e($value->nin_cost); ?>"
                                                                    placeholder="Total">
                                                                <span class="input-group-text">
                                                                    <?php echo e($setting->currency); ?></span>
                                                            </div>
                                                        </td>
                                                        <td width="20%">
                                                            <select
                                                                class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                name="account_id[]" id="account_id<?php echo e($value->id); ?>">
                                                                <option value=""><?php echo app('translator')->get('index.select'); ?></option>
                                                                <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option
                                                                        <?php echo e(isset($value->account_id) && $value->account_id == $account->id ? 'selected' : ''); ?>

                                                                        id="account_id" class="account_id"
                                                                        value="<?php echo e($account->id); ?>"><?php echo e($account->name); ?>

                                                                    </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </td>
                                                        <td class="text-end"><a
                                                                class="btn btn-xs del_row dlt_button"><iconify-icon
                                                                    icon="solar:trash-bin-minimalistic-broken"></iconify-icon></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                    <button id="fpnonitem" class="btn bg-blue-btn w-20 mt-2"
                                        type="button"><?php echo app('translator')->get('index.add_more'); ?></button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="w-5"></td>
                                            <td class="w-30"></td>
                                            <td class="w-20"></td>
                                            <td class="w-20"><label class="custom_label"><?php echo app('translator')->get('index.total_non_inventory_cost'); ?></label>
                                                <div class="input-group">
                                                    <input type="text" name="mnoninitem_total" id="noninitem_total"
                                                        class="form-control <?php $__errorArgs = ['mnoninitem_total'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        readonly placeholder="<?php echo e(__('index.total_non_inventory_cost')); ?>"
                                                        value="<?php echo e(isset($obj->mnoninitem_total) ? $obj->mnoninitem_total : old('mnoninitem_total')); ?>">
                                                    <span class="input-group-text"><?php echo e($setting->currency); ?></span>
                                                </div>
                                            </td>
                                            <td class="w-20"></td>
                                            <td class="w-5 text-end"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-2">
                        <div class="col-md-3">
                            <label class="custom_label"><?php echo app('translator')->get('index.total_cost'); ?></label>
                            <div class="input-group">
                                <input type="text" name="mtotal_cost" id="total_cost"
                                    class="form-control <?php $__errorArgs = ['mtotal_cost'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> total_cos margin_cal"
                                    readonly placeholder="Total Non Inventory Cost"
                                    value="<?php echo e(isset($obj->mtotal_cost) ? $obj->mtotal_cost : old('mtotal_cost')); ?>">
                                <span class="input-group-text"><?php echo e($setting->currency); ?></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="custom_label"><?php echo app('translator')->get('index.profit_margin'); ?> (%)</label>
                            <div class="input-group">
                                <input type="text" name="mprofit_margin" id="profit_margin"
                                    class="form-control <?php $__errorArgs = ['mprofit_margin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> profit_margin margin_cal integerchk"
                                    placeholder="Profit Margin"
                                    value="<?php echo e(isset($obj->mprofit_margin) ? $obj->mprofit_margin : old('mprofit_margin')); ?>">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <?php
                        $collect_tax = $tax_items->collect_tax;
                        $tax_information = json_decode(isset($obj->tax_information) && $obj->tax_information ? $obj->tax_information : '');
                        $tax_type = $tax_items->tax_type;
                        ?>
                        <input type="hidden" name="tax_type" class="tax_type" value="<?php echo e($tax_type); ?>">
                        <?php $__currentLoopData = $tax_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3 <?php echo e(isset($collect_tax) && $collect_tax == 'Yes' ? '' : 'd-none'); ?>">
                                <?php if($tax_information): ?>
                                    <?php $__currentLoopData = $tax_information; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $single_tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($tax_field->id == $single_tax->tax_field_id): ?>
                                            <label class="custom_label"><?php echo e($tax_field->tax); ?></label>
                                            <input onfocus="select();" tabindex="1" type="hidden"
                                                name="tax_field_id[]" value="<?php echo e($single_tax->tax_field_id); ?>">
                                            <input onfocus="select();" tabindex="1" type="hidden"
                                                name="tax_field_name[]" value="<?php echo e($single_tax->tax_field_name); ?>">

                                            <div class="input-group">
                                                <input onfocus="select();" tabindex="1" type="text"
                                                    name="tax_field_percentage[]"
                                                    class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> integerchk get_percentage cal_row"
                                                    placeholder="" value="<?php echo e($single_tax->tax_field_percentage); ?>">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <label class="custom_label"><?php echo e($tax_field->tax); ?></label>
                                    <input onfocus="select();" tabindex="1" type="hidden" name="tax_field_id[]"
                                        value="<?php echo e($tax_field->id); ?>">
                                    <input onfocus="select();" tabindex="1" type="hidden" name="tax_field_name[]"
                                        value="<?php echo e($tax_field->tax); ?>">
                                    <div class="input-group">
                                        <input onfocus="select();" tabindex="1" type="text"
                                            name="tax_field_percentage[]"
                                            class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> integerchk get_percentage cal_row"
                                            placeholder="<?php echo e($tax_field->tax); ?>" value="<?php echo e($tax_field->tax_rate); ?>">
                                        <span class="input-group-text">%</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <label class="custom_label"><?php echo app('translator')->get('index.sale_price'); ?> </label>
                            <div class="input-group">
                                <input type="text" name="msale_price" id="sale_price"
                                    class="form-control <?php $__errorArgs = ['msale_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> margin_cal sale_price"
                                    readonly placeholder="Sale Price"
                                    value="<?php echo e(isset($obj->msale_price) ? $obj->msale_price : old('msale_price')); ?>">
                                <span class="input-group-text"><?php echo e($setting->currency); ?></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row <?php echo e(isset($obj) ? '' : 'hidden_sec'); ?>">
                        <div class="clearfix"></div>
                        <h4 class="mb-0"><?php echo app('translator')->get('index.manufacture_stages'); ?></h4>
                        <p class="text-danger stage_check_error d-none"></p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive" id="purchase_cart">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="width_1_p"><?php echo app('translator')->get('index.sn'); ?></th>
                                                <th class="width_20_p stage_header"><?php echo app('translator')->get('index.check'); ?></th>
                                                <th class="width_20_p stage_header text-left">
                                                    <?php echo app('translator')->get('index.stage'); ?></th>
                                                <th class="width_20_p stage_header"><?php echo app('translator')->get('index.required_time'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody class="add_tstage">
                                            <?php if(isset($finishProductStage) && $finishProductStage): ?>
                                                <?php
                                                $total_month = 0;
                                                $total_day = 0;
                                                $total_hour = 0;
                                                $total_mimute = 0;
                                                $i = 1;
                                                ?>
                                                <?php $__currentLoopData = $finishProductStage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                    $checked = '';
                                                    $tmp_key = $key + 1;
                                                    if ($obj->stage_counter == $tmp_key) {
                                                        $checked = 'checked=checked';
                                                    }
                                                    $total_value = $value->stage_month * 2592000 + $value->stage_day * 86400 + $value->stage_hours * 3600 + $value->stage_minute * 60;
                                                    $months = floor($total_value / 2592000);
                                                    $hours = floor(($total_value % 86400) / 3600);
                                                    $days = floor(($total_value % 2592000) / 86400);
                                                    $minuts = floor(($total_value % 3600) / 60);
                                                    
                                                    $total_month += $months;
                                                    $total_hour += $hours;
                                                    $total_day += $days;
                                                    $total_mimute += $minuts;
                                                    
                                                    $total_stages = $total_month * 2592000 + $total_hour * 3600 + $total_day * 86400 + $total_mimute * 60;
                                                    $total_months = floor($total_stages / 2592000);
                                                    $total_hours = floor(($total_stages % 86400) / 3600);
                                                    $total_days = floor(($total_stages % 2592000) / 86400);
                                                    $total_minutes = floor(($total_stages % 3600) / 60);
                                                    
                                                    ?>
                                                    <tr class="rowCount2 align-baseline"
                                                        data-id="<?php echo e($value->productionstage_id); ?>">
                                                        <td class="width_1_p ir_txt_center">
                                                            <p class="set_sn2"></p>
                                                        </td>
                                                        <td class="width_1_p">
                                                            <input class="form-check-input set_class custom_checkbox"
                                                                data-stage_name="<?php echo e(getProductionStages($value->productionstage_id)); ?>"
                                                                type="radio" id="checkboxNoLabel" name="stage_check"
                                                                value="<?php echo e($i); ?>" <?php echo e($checked); ?>>

                                                        </td>
                                                        <td class="stage_name text-left"><input type="hidden"
                                                                value="<?php echo e($value->productionstage_id); ?>"
                                                                name="producstage_id[]">
                                                            <span><?php echo e(getProductionStages($value->productionstage_id)); ?></span>
                                                        </td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-xl-3 col-md-4">
                                                                    <div class="input-group">
                                                                        <input
                                                                            class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> stage_aligning"
                                                                            type="text" id="month_limit"
                                                                            name="stage_month[]"
                                                                            class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                            min="0" max="12"
                                                                            value="<?php echo e($value->stage_month); ?>"
                                                                            placeholder="Month"><span
                                                                            class="input-group-text"><?php echo app('translator')->get('index.months'); ?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-3 col-md-4">
                                                                    <div class="input-group">
                                                                        <input
                                                                            class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> stage_aligning"
                                                                            type="text" id="day_limit"
                                                                            name="stage_day[]" min="0"
                                                                            max="31"
                                                                            value="<?php echo e($value->stage_day); ?>"
                                                                            placeholder="Days"><span
                                                                            class="input-group-text"><?php echo app('translator')->get('index.days'); ?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-3 col-md-4">
                                                                    <div class="input-group">
                                                                        <input
                                                                            class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> stage_aligning"
                                                                            type="text" id="hours_limit"
                                                                            name="stage_hours[]" min="0"
                                                                            max="24"
                                                                            value="<?php echo e($value->stage_hours); ?>"
                                                                            placeholder="Hours"><span
                                                                            class="input-group-text"><?php echo app('translator')->get('index.hours'); ?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-3 col-md-4">
                                                                    <div class="input-group">
                                                                        <input
                                                                            class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> stage_aligning"
                                                                            type="text" id="minute_limit"
                                                                            name="stage_minute[]" min="0"
                                                                            max="60"
                                                                            value="<?php echo e($value->stage_minute); ?>"
                                                                            placeholder="Minutes"><span
                                                                            class="input-group-text"><?php echo app('translator')->get('index.minutes'); ?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $i++;
                                                    ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </tbody>
                                        <tr>
                                            <td class="width_1_p"></td>
                                            <td class="width_1_p"></td>
                                            <td class="width_1_p"><?php echo app('translator')->get('index.total'); ?></td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="input-group">
                                                            <input
                                                                class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> stage_aligning stage_color"
                                                                readonly type="text" id="t_month" name="t_month"
                                                                value="<?php echo e(isset($total_months) && $total_months ? $total_months : ''); ?>"
                                                                placeholder="Months">
                                                            <span class="input-group-text"><?php echo app('translator')->get('index.months'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="input-group">
                                                            <input
                                                                class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> stage_aligning stage_color"
                                                                readonly type="text" id="t_day" name="t_day"
                                                                value="<?php echo e(isset($total_days) && $total_days ? $total_days : ''); ?>"
                                                                placeholder="Days">
                                                            <span class="input-group-text"><?php echo app('translator')->get('index.days'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="input-group">
                                                            <input
                                                                class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> stage_aligning stage_color"
                                                                readonly type="text" id="t_hours" name="t_hours"
                                                                value="<?php echo e(isset($total_hours) && $total_hours ? $total_hours : ''); ?>"
                                                                placeholder="Hours">
                                                            <span class="input-group-text"><?php echo app('translator')->get('index.hours'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="input-group">
                                                            <input
                                                                class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> stage_aligning stage_color"
                                                                readonly type="text" id="t_minute" name="t_minute"
                                                                value="<?php echo e(isset($total_minutes) && $total_minutes ? $total_minutes : ''); ?>"
                                                                placeholder="Minutes">
                                                            <span class="input-group-text"><?php echo app('translator')->get('index.minutes'); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div><br>
                    <div class="row <?php echo e(isset($obj) ? '' : 'hidden_sec'); ?>">
                        <div class="clearfix"></div>
                        <h4 class="mb-0"><?php echo app('translator')->get('index.manufacture_scheduling'); ?></h4>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="table-responsive" id="purchase_cart">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="w-5"></th>
                                                <th class="w-5 text-start"><?php echo app('translator')->get('index.sn'); ?></th>
                                                <th class="w-20"><?php echo app('translator')->get('index.stage'); ?></th>
                                                <th class="w-25">
                                                    <?php echo app('translator')->get('index.task'); ?></th>
                                                <th class="w-20"><?php echo app('translator')->get('index.start_date'); ?></th>
                                                <th class="w-20"><?php echo app('translator')->get('index.complete_date'); ?></th>
                                                <th class="w-5 text-end"><?php echo app('translator')->get('index.actions'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody class="add_production_scheduling sort_menu">
                                            <?php if(isset($productionScheduling) && $productionScheduling): ?>
                                                <?php ($m = 0); ?>
                                                <?php $__currentLoopData = $productionScheduling; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr class="rowCount3" data-id="<?php echo e($value->production_stage_id); ?>"
                                                        data-row="<?php echo e(++$m); ?>">
                                                        <td><span class="handle me-2"><iconify-icon
                                                                    icon="radix-icons:move"></iconify-icon></span></td>
                                                        <td class="width_1_p text-start">
                                                            <p class="set_sn4"><?php echo e($m); ?></p>
                                                        </td>
                                                        <td>
                                                            <select
                                                                class="form-control manufacture_stage_id changeableInput"
                                                                name="productionstage_id_scheduling[]"
                                                                id="manufacture_stage_id_<?php echo e($m); ?>">
                                                                <option value=""><?php echo app('translator')->get('index.select'); ?></option>
                                                                <?php if(isset($p_stages) && $p_stages): ?>
                                                                    <?php $__currentLoopData = $p_stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option
                                                                            <?php echo e(isset($value->production_stage_id) && $value->production_stage_id == $stage->id ? 'selected' : ''); ?>

                                                                            value="<?php echo e($stage->id); ?>|<?php echo e($stage->name); ?>">
                                                                            <?php echo e($stage->name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="text" id="task" name="task[]"
                                                                    class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> changeableInput"
                                                                    value="<?php echo e($value->task); ?>" placeholder="Task">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="text" id="start_date" name="start_date[]"
                                                                    class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> changeableInput customDatepicker"
                                                                    value="<?php echo e($value->start_date); ?>"
                                                                    placeholder="Start Date">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="text" id="complete_date"
                                                                    name="complete_date[]"
                                                                    class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> changeableInput customDatepicker"
                                                                    value="<?php echo e($value->end_date); ?>"
                                                                    placeholder="Complete Date">
                                                            </div>
                                                            <p class="text-danger end_date_error d-none"></p>
                                                        </td>
                                                        <td class="text-end">
                                                            <a class="btn btn-xs del_row dlt_button"><iconify-icon
                                                                    icon="solar:trash-bin-minimalistic-broken"></iconify-icon></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                    <button id="scheduling_add" data-bs-toggle="modal"
                                        data-bs-target="#productScheduling" class="btn bg-blue-btn w-20 mt-2"
                                        type="button"><?php echo app('translator')->get('index.add_more'); ?></button>
                                </div>
                            </div>
                            <div class="col-xl-12 p-0">
                                <div class="gantt"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6 mb-2">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('index.note'); ?></label>
                                <textarea name="note" id="note" class="form-control <?php $__errorArgs = ['note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="Note"><?php echo e(isset($obj->note) ? $obj->note : old('note')); ?></textarea>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6 mb-2">
                            <div class="form-group custom_table">
                                <label><?php echo app('translator')->get('index.add_a_file'); ?> (<?php echo app('translator')->get('index.max_size_5_mb'); ?>)</label>
                                <table width="100%">
                                    <tbody>
                                        <tr>
                                            <td width="100%">
                                                <input type="hidden" name="file_old"
                                                    value="<?php echo e(isset($obj->file) && $obj->file ? $obj->file : ''); ?>">
                                                <input type="file" name="file_button[]" id="file_button"
                                                    class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> file_checker_global image_preview"
                                                    accept="image/png,image/jpeg,image/jgp,image/gif,application/pdf,.doc,.docx"
                                                    multiple>
                                                <p class="text-danger errorFile"></p>
                                                <div class="image-preview-container">
                                                    <?php if(isset($obj->file) && $obj->file): ?>
                                                        <?php ($files = explode(',', $obj->file)); ?>

                                                        <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php ($fileExtension = pathinfo($file, PATHINFO_EXTENSION)); ?>
                                                            <?php if($fileExtension == 'pdf'): ?>
                                                                <a class="text-decoration-none"
                                                                    href="<?php echo e($baseURL); ?>uploads/manufacture/<?php echo e($file); ?>"
                                                                    target="_blank">
                                                                    <img src="<?php echo e($baseURL); ?>assets/images/pdf.png"
                                                                        alt="PDF Preview" class="img-thumbnail mx-2"
                                                                        width="100px">
                                                                </a>
                                                            <?php elseif($fileExtension == 'doc' || $fileExtension == 'docx'): ?>
                                                                <a class="text-decoration-none"
                                                                    href="<?php echo e($baseURL); ?>uploads/manufacture/<?php echo e($file); ?>"
                                                                    target="_blank">
                                                                    <img src="<?php echo e($baseURL); ?>assets/images/word.png"
                                                                        alt="Word Preview" class="img-thumbnail mx-2"
                                                                        width="100px">
                                                                </a>
                                                            <?php else: ?>
                                                                <a class="text-decoration-none"
                                                                    href="<?php echo e($baseURL); ?>uploads/manufacture/<?php echo e($file); ?>"
                                                                    target="_blank">
                                                                    <img src="<?php echo e($baseURL); ?>uploads/manufacture/<?php echo e($file); ?>"
                                                                        alt="File Preview" class="img-thumbnail mx-2"
                                                                        width="100px">
                                                                </a>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="row mt-2">
                        <div class="col-sm-12 col-md-6 mb-2 d-flex gap-3">
                            <button type="submit" name="submit" value="submit"
                                class="btn bg-blue-btn submit_btn"><iconify-icon
                                    icon="solar:check-circle-broken"></iconify-icon><?php echo app('translator')->get('index.submit'); ?></button>
                            <button type="button" class="btn bg-blue-btn d-none" id="checkStockButton"
                                data-bs-toggle="modal" data-bs-target="#stockCheck"><iconify-icon
                                    icon="solar:info-circle-broken"></iconify-icon><?php echo app('translator')->get('index.check_stock'); ?></button>
                            <a class="btn bg-second-btn" href="<?php echo e(route('productions.index')); ?>"><iconify-icon
                                    icon="solar:round-arrow-left-broken"></iconify-icon><?php echo app('translator')->get('index.back'); ?></a>
                        </div>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>

            <select id="ram_hidden" class="display_none" name="rmaterials_id">
                <option value=""><?php echo app('translator')->get('index.select'); ?></option>
                <?php $__currentLoopData = $rmaterials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option id="rmaterials_ids" class="rmaterials_ids"
                        value="<?php echo e($value->id . '|' . $value->unit . '|' . getPurchaseSaleUnitById($value->consumption_unit) . '|' . $setting->currency . '|' . $value->rate_per_consumption_unit . '|' . $value->rate_per_unit . '|' . getPurchaseUnitByRMID($value->id)); ?>">
                        <?php echo e($value->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <select id="noni_hidden" class="display_none" name="noninvemtory_id">
                <option value=""><?php echo app('translator')->get('index.select'); ?></option>
                <?php $__currentLoopData = $nonitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option id="noninvemtory_ids" class="noninvemtory_ids"
                        value="<?php echo e($value->id . '|' . $value->nin_cost . '|' . $setting->currency); ?>">
                        <?php echo e($value->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <select id="stages_hidden" class="display_none">
                <option value=""><?php echo app('translator')->get('index.select'); ?></option>
                <?php $__currentLoopData = $p_stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option id="noninvemtory_ids" class="noninvemtory_ids"
                        value="<?php echo e($value->id . '|' . $value->nin_cost . '|' . $setting->currency); ?>">
                        <?php echo e($value->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <select id="account_hidden" class="display_none" name="account_id">
                <option value=""><?php echo app('translator')->get('index.select'); ?></option>
                <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option id="account_id" class="account_id" value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <select id="customers_hidden" class="display_none" name="customers_id">
                <option value=""><?php echo app('translator')->get('index.select'); ?></option>
                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
    </section>

    
    <div class="modal fade" id="stockCheck" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><?php echo app('translator')->get('index.current_stock'); ?></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i data-feather="x"></i></span>
                    </button>
                </div>
                <form action="<?php echo e(route('purchase-generate-customer-order')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="table-responsive" id="check_stock_modal_body">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn bg-blue-btn delivaries_button"><iconify-icon
                                icon="solar:cart-plus-broken"></iconify-icon>
                            <?php echo app('translator')->get('index.purchase'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="productScheduling" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><?php echo app('translator')->get('index.add_product_scheduling'); ?></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i data-feather="x"></i></span>
                    </button>
                </div>
                <form id="product_scheduling_form">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 mb-2 col-md-6">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('index.stage'); ?> <span class="required_star">*</span></label>
                                    <select class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2"
                                        name="productionstage_id" id="productionstage_id">
                                        <option value=""><?php echo app('translator')->get('index.select'); ?></option>
                                        <?php if(isset($p_stages) && $p_stages): ?>
                                            <?php $__currentLoopData = $p_stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($value->id); ?>|<?php echo e($value->name); ?>">
                                                    <?php echo e($value->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                    <p class="text-danger stage_error"></p>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2 col-md-6">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('index.task'); ?> <span class="required_star">*</span></label>
                                    <input type="text" name="task"
                                        class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="task"
                                        placeholder="Task">
                                    <p class="text-danger task_error"></p>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2 col-md-6">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('index.start_date'); ?> <span class="required_star">*</span></label>
                                    <input type="text" name="start_date"
                                        class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> customDatepicker"
                                        id="ps_start_date" placeholder="Start Date">
                                    <p class="text-danger start_date_error"></p>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2 col-md-6">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('index.complete_date'); ?> <span class="required_star">*</span></label>
                                    <input type="text" name="complete_date"
                                        class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> customDatepicker"
                                        id="ps_complete_date" placeholder="Complete Date">
                                    <p class="text-danger end_date_error"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-blue-btn product_scheduling_button"><iconify-icon
                                icon="solar:check-circle-broken"></iconify-icon>
                            <?php echo app('translator')->get('index.add'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('top_script'); ?>
    <script type="text/javascript" src="<?php echo $baseURL . 'assets/bower_components/jquery-ui/jquery-ui.min.js'; ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="<?php echo $baseURL . 'assets/bower_components/gantt/js/jquery.fn.gantt.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo $baseURL . 'assets/bower_components/gantt/js/jquery.cookie.min.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo $baseURL . 'frequent_changing/js/genchat.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo $baseURL . 'frequent_changing/js/addManufactures.js?v=2.1'; ?>"></script>
    <script type="text/javascript" src="<?php echo $baseURL . 'frequent_changing/js/imagePreview.js'; ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\saibhagabati\resources\views/pages/manufacture/addEditManufacture.blade.php ENDPATH**/ ?>