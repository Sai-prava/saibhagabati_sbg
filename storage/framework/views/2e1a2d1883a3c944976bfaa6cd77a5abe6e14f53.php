

<?php $__env->startSection('script_top'); ?>
    <?php
    $baseURL = getBaseURL();
    $setting = getSettingsInfo();
    ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="main-content-wrapper">
        <section class="content-header">
            <h3 class="top-left-header">
                <?php echo e(isset($title) && $title ? $title : ''); ?>

            </h3>
        </section>

        <?php echo $__env->make('utilities.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="box-wrapper">
            <!-- general form elements -->
            <div class="table-box">
                <!-- form start -->
                <?php echo Form::model(isset($obj) && $obj ? $obj : '', [
                    'id' => 'purchase_form',
                    'method' => isset($obj) && $obj ? 'PATCH' : 'POST',
                    'enctype' => 'multipart/form-data',
                    'route' => ['rawmaterialpurchases.update', isset($obj->id) && $obj->id ? $obj->id : ''],
                ]); ?>

                <?php echo csrf_field(); ?>
                <div>
                    <div class="row">
                        <div class="col-sm-12 mb-2 col-md-4">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('index.reference_no'); ?> <span class="required_star">*</span></label>
                                <input type="text" name="reference_no" id="reference_no"
                                    class="check_required form-control <?php $__errorArgs = ['reference_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="Reference No"
                                    value="<?php echo e(isset($obj->reference_no) ? $obj->reference_no : $ref_no); ?>" readonly>
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
                                <label><?php echo app('translator')->get('index.supplier'); ?> <span class="required_star">*</span></label>

                                <div class="d-flex align-items-center">
                                    <div class="w-100">
                                        <select tabindex="2"
                                            class="form-control <?php $__errorArgs = ['supplier'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2"
                                            id="supplier_id" name="supplier">
                                            <option value=""><?php echo app('translator')->get('index.select_supplier'); ?></option>
                                            <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                $current_due = currentSupplierDue($value->id);
                                                ?>
                                                <option
                                                    <?php echo e((isset($obj->supplier) && $obj->supplier == $value->id) || old('supplier') == $value->id ? 'selected' : ''); ?>

                                                    data-credit_limit="<?php echo e($value->credit_limit); ?>"
                                                    data-current_due="<?php echo e($current_due); ?>" value="<?php echo e($value->id); ?>">
                                                    <?php echo e($value->name); ?>(<?php echo e($value->phone); ?>)
                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div>
                                        <button type="button"
                                            class="btn btn-md pull-right fit-content bg-second-btn plus_add_btn ms-2 view_modal_button"
                                            data-bs-toggle="modal" data-bs-target="#supplierModal">
                                            <iconify-icon icon="solar:add-circle-broken"></iconify-icon>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="text-danger supplierErr d-none"></div>

                            <div class="alert alert-primary p-1 supplier_due d-none mt-1" role="alert">
                                
                            </div>
                            <input type="hidden" name="supplier_due">
                            <?php $__errorArgs = ['supplier'];
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

                        <div class="col-sm-12 mb-2 col-md-4">
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
                                    placeholder="Date" value="<?php echo e(isset($obj->date) ? $obj->date : old('date')); ?>">
                                <div class="text-danger d-none"></div>
                                <?php $__errorArgs = ['date'];
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
                        <div class="col-sm-12 mb-2 col-md-4">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('index.type'); ?> <span class="required_star">*</span></label>
                                <select class="form-control <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2" name="type"
                                    id="type">
                                    <option value="purchase"
                                        <?php echo e((isset($obj->type) && $obj->type == 'purchase') || old('type') == 'purchase' ? 'selected' : ''); ?>>
                                        <?php echo app('translator')->get('index.purchases'); ?></option>
                                    <option value="purchase_order"
                                        <?php echo e((isset($obj->type) && $obj->type == 'purchase_order') || old('type') == 'purchase_order' ? 'selected' : ''); ?>>
                                        <?php echo app('translator')->get('index.purchase_order'); ?></option>
                                </select>
                            </div>
                            <div class="text-danger d-none"></div>
                            <?php $__errorArgs = ['type'];
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
                        <div class="col-sm-12 mb-2 col-md-4">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('index.status'); ?> <span class="required_star">*</span></label>
                                <select class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2" name="status"
                                    id="status">
                                    <option value="Draft"
                                        <?php echo e((isset($obj->status) && $obj->status == 'Draft') || old('status') == 'Draft' ? 'selected' : ''); ?>>
                                        <?php echo app('translator')->get('index.draft'); ?></option>
                                    <option value="Final"
                                        <?php echo e((isset($obj->status) && $obj->status == 'Final') || old('status') == 'Final' ? 'selected' : ''); ?>>
                                        <?php echo app('translator')->get('index.final'); ?></option>
                                </select>
                            </div>
                            <div class="text-danger d-none"></div>
                            <?php $__errorArgs = ['status'];
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

                        <div class="col-sm-12 mb-2 col-md-4">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('index.invoice_no'); ?></label>
                                <input type="text" name="invoice_no"
                                    class="form-control <?php $__errorArgs = ['invoice_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Invoice No"
                                    value="<?php echo e(isset($obj->invoice_no) && $obj->invoice_no ? $obj->invoice_no : old('invoice_no')); ?>">
                                <?php $__errorArgs = ['invoice_no'];
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
                        <div class="col-sm-12 mb-2 col-md-4">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('index.raw_material'); ?> <span class="required_star">*</span></label>
                                <select tabindex="4"
                                    class="form-control <?php $__errorArgs = ['rmaterial'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2 select2-hidden-accessible"
                                    name="rmaterial" id="rmaterial">
                                    <option value=""><?php echo app('translator')->get('index.select'); ?></option>
                                    <?php $__currentLoopData = $rmaterials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($rm->id . '|' . $rm->name . ' (' . $rm->code . ')|' . $rm->name . '|' . $rm->rate_per_unit . '|' . getPurchaseSaleUnitById($rm->unit) . '|' . $setting->currency); ?>"><?php echo e($rm->name . '(' . $rm->code . ')'); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <?php $__errorArgs = ['rmaterial'];
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
                        <div class="col-sm-12 mb-2 col-md-8 mt-c-17 d-flex">
                            <div class="form-group me-2">
                                <?php if(!isset($pruchse_rmaterials)): ?>
                                    <button type="button" class="btn bg-blue-btn low_stock"><?php echo app('translator')->get('index.low_stock'); ?></button>
                                <?php endif; ?>
                            </div>
                            <div class="form-group me-2">
                                <?php if(!isset($pruchse_rmaterials)): ?>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#multipleProductModal"
                                        class="btn bg-blue-btn multi_product"><?php echo app('translator')->get('index.generate_purchase_from_multiple_product'); ?></button>
                                <?php endif; ?>
                            </div>
                            <div class="form-group ">
                                <?php if(!isset($pruchse_rmaterials)): ?>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#productionProductModal"
                                        class="btn bg-blue-btn production_button"><?php echo app('translator')->get('index.generate_purchase_from_order'); ?></button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive" id="purchase_cart">
                                <table class="table">
                                    <thead>
                                        <th class="w-5 text-start"><?php echo app('translator')->get('index.sn'); ?></th>
                                        <th class="w-30"><?php echo app('translator')->get('index.raw_material'); ?>(<?php echo app('translator')->get('index.code'); ?>)</th>
                                        <th class="w-20"><?php echo app('translator')->get('index.unit_price'); ?><span class="required_star">*</span></th>
                                        <th class="w-20"><?php echo app('translator')->get('index.quantity'); ?><span class="required_star">*</span></th>
                                        <th class="w-20"><?php echo app('translator')->get('index.total'); ?></th>
                                        <th class="w-5 ir_txt_center"><?php echo app('translator')->get('index.actions'); ?></th>
                                    </thead>
                                    <tbody class="add_tr">
                                        <?php if(isset($pruchse_rmaterials) && $pruchse_rmaterials): ?>
                                            <?php $__currentLoopData = $pruchse_rmaterials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="rowCount" data-id="<?php echo e($value->rmaterials_id); ?>">
                                                    <td class="width_1_p ir_txt_center">
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
unset($__errorArgs, $__bag); ?> integerchk input_aligning unit_price_c cal_row"
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
unset($__errorArgs, $__bag); ?> integerchk input_aligning qty_c cal_row"
                                                                value="<?php echo e(isset($value->shortage) ? $value->shortage : $value->quantity_amount); ?>"
                                                                placeholder="Qty/Amount">
                                                            <span
                                                                class="input-group-text"><?php echo e(getPurchaseSaleUnitById($value->rmaterials_id)); ?></span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" id="total_1" name="total[]"
                                                                class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> total_c"
                                                                value="<?php echo e(isset($value->shortage_total) ? (int) $value->shortage_total : $value->total); ?>"
                                                                placeholder="Total" readonly="">
                                                            <span class="input-group-text">
                                                                <?php echo e($setting->currency); ?></span>
                                                        </div>
                                                    </td>
                                                    <td class="ir_txt_center"><a
                                                            class="btn btn-xs text-danger del_row"><iconify-icon
                                                                icon="solar:trash-bin-minimalistic-broken"></iconify-icon></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label><?php echo app('translator')->get('index.note'); ?></label>
                                        <textarea name="note" id="note" class="form-control <?php $__errorArgs = ['note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Note"><?php echo e(isset($obj->note) ? $obj->note : old('note')); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group custom_table">
                                        <label><?php echo app('translator')->get('index.relavent_file'); ?> (<?php echo app('translator')->get('index.max_size_5_mb'); ?>)</label>
                                        <table width="100%">
                                            <tbody>
                                                <tr>
                                                    <td width="100%">
                                                        <input type="hidden" name="file_old"
                                                            value="<?php echo e(isset($obj->file) && $obj->file ? $obj->file : ''); ?>">
                                                        <input type="file" name="file_button" id="file_button"
                                                            class="form-control <?php $__errorArgs = ['file_button'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> file_checker_global"
                                                            accept="image/png,image/jpeg,image/jgp,image/gif,application/pdf,.doc,.docx">
                                                        <p class="text-danger errorFile"></p>
                                                    </td>
                                                    <?php if(isset($obj->file) && $obj->file): ?>
                                                        <td class="w_1 d-flex">
                                                            <a href="<?php echo e($baseURL); ?>uploads/purchase/<?php echo e($obj->file); ?>"
                                                                target="_blank"
                                                                class="btn btn-md pull-right fit-content bg-second-btn view_modal_button ms-2"
                                                                id="favicon_preview"><iconify-icon
                                                                    icon="solar:eye-broken"></iconify-icon></a>
                                                        </td>
                                                    <?php endif; ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="row mb-1">
                                <label class="custom_label"><?php echo app('translator')->get('index.subtotal'); ?> <span
                                        class="required_star">*</span></label>
                                <div class="input-group">
                                    <input type="text" name="subtotal" id="subtotal"
                                        class="form-control <?php $__errorArgs = ['subtotal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" readonly
                                        placeholder="Sub Total"
                                        value="<?php echo e(isset($obj->subtotal) ? $obj->subtotal : (isset($subtotal_shoratage) ? $subtotal_shoratage : old('subtotal'))); ?>">
                                    <span class="input-group-text"><?php echo e($setting->currency); ?></span>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <label class="custom_label"><?php echo app('translator')->get('index.other'); ?></label>
                                <div class="input-group">
                                    <input type="text" name="other" id="other"
                                        class="form-control <?php $__errorArgs = ['other'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> integerchk cal_row"
                                        placeholder="Other"
                                        value="<?php echo e(isset($obj->other) ? $obj->other : old('other')); ?>">
                                    <span class="input-group-text"><?php echo e($setting->currency); ?></span>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('index.discount'); ?></label>
                                    <input type="text" name="discount" id="discount"
                                        class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> discount cal_row"
                                        data-special_ignore="ignore" placeholder="Discount"
                                        value="<?php echo e(isset($obj->discount) ? $obj->discount : old('discount')); ?>">
                                </div>
                            </div>

                            <div class="row mb-1">
                                <label class="custom_label"><?php echo app('translator')->get('index.g_total'); ?> <span
                                        class="required_star">*</span></label>
                                <div class="input-group">
                                    <input type="text" name="grand_total" id="grand_total"
                                        class="form-control <?php $__errorArgs = ['grand_total'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" readonly
                                        placeholder="G.Total"
                                        value="<?php echo e(isset($obj->grand_total) ? $obj->grand_total : (isset($subtotal_shoratage) ? $subtotal_shoratage : old('grand_total'))); ?>">
                                    <span class="input-group-text"><?php echo e($setting->currency); ?></span>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <label class="custom_label"><?php echo app('translator')->get('index.paid'); ?> <span
                                        class="required_star">*</span></label>
                                <div class="input-group">
                                    <input type="text" name="paid" id="paid"
                                        class="form-control <?php $__errorArgs = ['paid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> check_required integerchk cal_row"
                                        placeholder="Paid" value="<?php echo e(isset($obj->paid) ? $obj->paid : old('paid')); ?>"
                                        onfocus="select()"></td>
                                    <span class="input-group-text"><?php echo e($setting->currency); ?></span>
                                </div>
                                <div class="text-danger d-none paidErr"></div>
                                <?php $__errorArgs = ['paid'];
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

                            <div class="row mb-1">
                                <label class="custom_label"><?php echo app('translator')->get('index.account'); ?> <span
                                        class="required_star">*</span></label>
                                <div class="d-flex align-items-center">
                                    <div class="w-100">
                                        <select tabindex="2"
                                            class="form-control <?php $__errorArgs = ['account'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2"
                                            id="accounts" name="account">
                                            <option value=""><?php echo app('translator')->get('index.select'); ?></option>
                                            <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    <?php echo e((isset($obj->account) && $obj->account == $value->id) || old('account') == $value->id ? 'selected' : ''); ?>

                                                    value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <div class="text-danger d-none"></div>
                                    </div>

                                    <div class="paid_err_msg_contnr">
                                        <p id="account_err_msg"></p>
                                    </div>
                                    <?php $__errorArgs = ['account'];
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

                            <div class="row mb-1">
                                <label class="custom_label"><?php echo app('translator')->get('index.due'); ?></label>
                                <div class="input-group">
                                    <input type="text" name="due" id="due"
                                        class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> integerchk supplier_current_due check"
                                        readonly placeholder="Due"
                                        value="<?php echo e(isset($obj->due) ? $obj->due : old('due')); ?>">
                                    <span class="input-group-text"><?php echo e($setting->currency); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input class="form-control supplier_credit_limit"
                    value="<?php echo e(isset($obj) ? $obj->getSupplier->credit_limit : null); ?>" type="hidden">
            </div>
            <!-- /.box-body -->

            <div class="row mt-2">
                <div class="col-sm-12 col-md-6 mb-2 d-flex gap-3">
                    <button type="submit" name="submit" value="submit" class="btn bg-blue-btn"><iconify-icon
                            icon="solar:check-circle-broken"></iconify-icon><?php echo app('translator')->get('index.submit'); ?></button>
                    <a class="btn bg-second-btn" href="<?php echo e(route('rawmaterialpurchases.index')); ?>"><iconify-icon
                            icon="solar:round-arrow-left-broken"></iconify-icon><?php echo app('translator')->get('index.back'); ?></a>
                </div>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </section>


    <div class="modal fade" id="supplierModal" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                        <?php echo app('translator')->get('index.add_supplier'); ?></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i data-feather="x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 mb-2">
                                <div class="form-group">
                                    <label class="control-label"><?php echo app('translator')->get('index.name'); ?><span class="ir_color_red">
                                            *</span></label>
                                    <div>
                                        <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            name="name" id="name" placeholder="Name" value="">
                                        <div class="supplier_err_msg_contnr">
                                            <p class="text-danger supplier_err_msg"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 mb-2">
                                <div class="form-group">
                                    <label class="control-label"><?php echo app('translator')->get('index.contact_person'); ?></label>
                                    <div>
                                        <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            name="contact_person" id="contact_person" placeholder="Contact Person"
                                            value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 mb-2">
                                <div class="form-group">
                                    <label class="control-label"><?php echo app('translator')->get('index.phone'); ?> <span
                                            class="required_star">*</span></label>
                                    <div>
                                        <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="phone" name="phone" placeholder="Phone" value="">
                                        <div class="customer_phone_err_msg_contnr err_cust">
                                            <p class="text-danger customer_phone_err_msg"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 mb-2">
                                <div class="form-group">
                                    <label class="control-label"><?php echo app('translator')->get('index.email'); ?></label>
                                    <div>
                                        <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="emailAddress" name="emailAddress" placeholder="Email" value="">
                                        <div class="supplier_email_err_msg_contnr err_cust">
                                            <p class="text-danger supplier_email_err_msg"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <div class="d-flex justify-content-between">
                                    <div class="form-group w-100 me-2">
                                        <label><?php echo app('translator')->get('index.opening_balance'); ?></label>
                                        <input type="text" name="opening_balance" id="opening_balance"
                                            class="form-control <?php $__errorArgs = ['opening_balance'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> integerchk"
                                            placeholder="Opening Balance">
                                        <div class="supplier_opening_balace_err_msg_contnr err_cust">
                                            <p class="text-danger supplier_opening_balace_err_msg"></p>
                                        </div>
                                    </div>
                                    <div class="form-group w-100">
                                        <label>&nbsp;</label>
                                        <select
                                            class="form-control <?php $__errorArgs = ['opening_balance_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2"
                                            name="opening_balance_type" id="opening_balance_type">
                                            <option value="Debit">
                                                <?php echo app('translator')->get('index.debit'); ?></option>
                                            <option value="Credit">
                                                <?php echo app('translator')->get('index.credit'); ?></option>
                                        </select>
                                        <div class="supplier_balance_type_err_msg_contnr err_cust">
                                            <p class="text-danger supplier_balance_type_err_msg"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 mb-2">
                                <div class="form-group">
                                    <label class="control-label"><?php echo app('translator')->get('index.credit_limit'); ?></label>
                                    <div>
                                        <input type="text"
                                            class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> integerchk"
                                            id="credit_limit" name="credit_limit" placeholder="Credit Limit"
                                            value="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 mb-2">
                                <div class="form-group">
                                    <label class="control-label"><?php echo app('translator')->get('index.address'); ?></label>
                                    <div>
                                        <textarea tabindex="4" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="3" name="supAddress"
                                            placeholder="Address"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 mb-2">
                                <div class="form-group">
                                    <label class="control-label"><?php echo app('translator')->get('index.note'); ?></label>
                                    <div>
                                        <textarea tabindex="4" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="4" name="suppNote"
                                            placeholder="Enter ..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-blue-btn" value="submit" id="addSupplier"><iconify-icon
                            icon="solar:check-circle-broken"></iconify-icon> <?php echo app('translator')->get('index.submit'); ?>
                    </button>
                </div>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="multipleProductModal" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                        <?php echo app('translator')->get('index.select_multiple_product'); ?></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i data-feather="x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 mb-2 col-md-5">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('index.product'); ?> <span class="required_star">*</span></label>
                                <select tabindex="4" class="form-control select2 select2-hidden-accessible"
                                    name="product" id="productModal">
                                    <option value=""><?php echo app('translator')->get('index.select'); ?></option>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($p->id); ?>|<?php echo e($p->name); ?>(<?php echo e($p->code); ?>)"><?php echo e($p->name); ?>(<?php echo e($p->code); ?>)
                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div class="text-danger productErr"></div>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-2 col-md-5">
                            <label class="custom_label"><?php echo app('translator')->get('index.quantity'); ?> <span class="required_star">*</span></label>
                            <div class="input-group">
                                <input type="number" autocomplete="off" min="1"
                                    class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> integerchk1"
                                    onfocus="select();" name="qty_modal_product" id="qty_modal_product"
                                    placeholder="Quantity" value="1">
                                <span class="input-group-text modal_unit_name" id="basic-addon2">Piece</span>
                            </div>
                            <div class="text-danger qtyErr"></div>
                        </div>
                        <div class="col-sm-12 mb-2 col-md-2 mt-3">
                        <button type="button"
                                    class="btn w-100 bg-blue-btn add_to_cart_multiple_product"><?php echo app('translator')->get('index.add'); ?></button>
                        </div>
                    </div>
                    <div id="addToCartSec" class="d-none">
                        <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('index.sn'); ?></th>
                                    <th><?php echo app('translator')->get('index.name'); ?></th>
                                    <th><?php echo app('translator')->get('index.quantity'); ?></th>
                                    <th class="text-end"><?php echo app('translator')->get('index.actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody id="cart_data">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-blue-btn" value="submit" id="generate_purchase"><iconify-icon
                            icon="solar:check-circle-broken"></iconify-icon>
                        <?php echo app('translator')->get('index.generate_purchase'); ?>
                    </button>
                </div>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="productionProductModal" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                        <?php echo app('translator')->get('index.select_order'); ?></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i data-feather="x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('index.product'); ?> <span class="required_star">*</span></label>
                                <select tabindex="4" class="form-control select2 select2-hidden-accessible"
                                    name="order" id="orderModal">
                                    <option value=""><?php echo app('translator')->get('index.select'); ?></option>
                                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($order->id); ?>"><?php echo e($order->reference_no); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div class="text-danger orderErrMsg"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-blue-btn" value="submit"
                        id="generate_purchase_from_production"><iconify-icon
                            icon="solar:check-circle-broken"></iconify-icon> <?php echo app('translator')->get('index.generate_purchase'); ?>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cartPreviewModal" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                        <?php echo app('translator')->get('index.select_raw_materials'); ?></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i data-feather="x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo app('translator')->get('index.name'); ?>: </label>
                            <div class="col-sm-7">
                                <p class="item_name_modal"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-sm-12 control-label custom_label mb-1"><?php echo app('translator')->get('index.unit_price'); ?> <span
                                        class="required_star">*</span></label>
                                <div class="col-sm-12">
                                    <input type="text" autocomplete="off"
                                        class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> integerchk1"
                                        onfocus="select();" name="unit_price_modal" id="unit_price_modal"
                                        placeholder="Unit Price" value="">
                                    <input type="hidden" name="item_id_modal" id="item_id_modal" value="">
                                    <input type="hidden" name="item_name_modal" id="item_name_modal" value="">
                                    <input type="hidden" name="item_currency_modal" id="item_currency_modal"
                                        value="">
                                    <input type="hidden" name="item_unit_modal" id="item_unit_modal" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-sm-12 control-label custom_label mb-1"><?php echo app('translator')->get('index.quantity'); ?> <span
                                        class="required_star">*</span></label>
                                <div class="col-sm-12">

                                    <div class="input-group mb-3">
                                        <input type="number" autocomplete="off" min="1"
                                            class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> integerchk1"
                                            onfocus="select();" name="qty_modal" id="qty_modal" placeholder="Quantity"
                                            value="1">
                                        <span class="input-group-text modal_unit_name" id="basic-addon2"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer ir_d_block">
                    <button type="button" class="btn bg-blue-btn" id="addToCart"><iconify-icon
                            icon="solar:add-circle-broken"></iconify-icon><?php echo app('translator')->get('index.add_to_cart'); ?>
                    </button>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php
    /*get base url from helper function*/
    $baseURL = getBaseURL();
    
    ?>
    <script type="text/javascript" src="<?php echo $baseURL . 'frequent_changing/js/addRMPurchase.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo $baseURL . 'frequent_changing/js/supplier.js'; ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\saibhagabati\resources\views/pages/purchase/addEditPurchase.blade.php ENDPATH**/ ?>