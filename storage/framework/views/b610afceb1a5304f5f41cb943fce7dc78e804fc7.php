
<?php $__env->startSection('content'); ?>
    <?php
    $baseURL = getBaseURL();
    $setting = getSettingsInfo();
    $base_color = '#6ab04c';
    if (isset($setting->base_color) && $setting->base_color) {
        $base_color = $setting->base_color;
    }
    ?>
    <section class="main-content-wrapper">
        <?php echo $__env->make('utilities.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <section class="content-header">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="top-left-header"><?php echo e(isset($title) && $title ? $title : ''); ?></h2>
                    <input type="hidden" class="datatable_name" data-filter="yes"
                        data-title="<?php echo e(isset($title) && $title ? $title : ''); ?>" data-id_name="datatable">
                </div>
                <div class="col-md-offset-4 col-md-2">

                </div>
            </div>
        </section>

        <div class="box-wrapper">
            <div class="table-box">
                <!-- /.box-header -->
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped">
                        <thead>
                            <tr>
                                <th class="width_1_p"><?php echo app('translator')->get('index.sn'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.reference_no'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.product'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.status'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.start_date'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.complete_date'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.batch_no'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.manufacture_stages'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.remaining_time'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.consumed_time'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.quantity'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.partially_done_quantity'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.remaining_quantity'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.expiry_date'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.manufacture_cost'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.sale_price'); ?></th>
                                <th class="width_1_p"><?php echo app('translator')->get('index.actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($obj && !empty($obj)): ?>
                                <?php
                                $i = count($obj);
                                ?>
                            <?php endif; ?>
                            <?php $__currentLoopData = $obj; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="c_center"><?php echo e($i--); ?></td>
                                    <td><?php echo e(safe($value->reference_no)); ?></td>
                                    <td><?php echo e(safe(getProductNameById($value->product_id))); ?></td>
                                    <td><?php echo e(safe(manufactureStatusShow($value->manufacture_status))); ?></td>
                                    <td><?php echo e(safe(getDateFormat($value->start_date))); ?></td>
                                    <td><?php echo e($value->complete_date != null ? safe(getDateFormat($value->complete_date)) : 'N/A'); ?>

                                    </td>
                                    <td><?php echo e(safe($value->batch_no)); ?></td>
                                    <td><?php echo e(safe($value->stage_name)); ?></td>
                                    <td>N/A</td>
                                    <td><?php echo e(safe($value->consumed_time)); ?></td>
                                    <td><?php echo e($value->product_quantity ?? 0); ?></td>
                                    <td><?php echo e($value->partially_done_quantity ?? 0); ?></td>
                                    <td><?php echo e($value->product_quantity - ($value->partially_done_quantity ?? 0)); ?></td>
                                    <td><?php echo e($value->expiry_days == null || $value->expiry_days == 0 || $value->complete_date == null ? 'N/A' : getDateFormat(expireDate($value->complete_date, $value->expiry_days))); ?>

                                    </td>
                                    <td><?php echo e(safe(getCurrency($value->mtotal_cost))); ?></td>
                                    <td><?php echo e(safe(getCurrency($value->msale_price))); ?></td>
                                    <td>
                                        <?php if($value->manufacture_status != 'done'): ?>
                                            <?php if(routePermission('productions.edit')): ?>
                                                <a href="<?php echo e(url('productions')); ?>/<?php echo e(encrypt_decrypt($value->id, 'encrypt')); ?>/edit"
                                                    class="button-success" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="<?php echo app('translator')->get('index.edit'); ?>"><i class="fa fa-edit"></i></a>
                                            <?php endif; ?>
                                            <a href="javascript:void(0)" class="button-info changePartillyDone"
                                                data-bs-toggle="modal" data-bs-target="#changeStatusModal"
                                                data-id="<?php echo e($value->id); ?>"
                                                data-total_quantity="<?php echo e($value->product_quantity); ?>"
                                                data-partially_done="<?php echo e($value->partially_done_quantity ?? 0); ?>"><i
                                                    class="fa fa-pencil" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="<?php echo app('translator')->get('index.update_partially_done'); ?>"></i></a>
                                        <?php endif; ?>

                                        <?php if(routePermission('manufacture.view')): ?>
                                            <a href="<?php echo e(url('productions')); ?>/<?php echo e(encrypt_decrypt($value->id, 'encrypt')); ?>"
                                                class="button-info" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="<?php echo app('translator')->get('index.view_details'); ?>">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if(routePermission('manufacture.duplicate')): ?>
                                            <a href="<?php echo e(url('productions')); ?>/<?php echo e(encrypt_decrypt($value->id, 'encrypt')); ?>/duplicate"
                                                class="button-info" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="<?php echo app('translator')->get('index.clone'); ?>"><i class="fa fa-clone"></i></a>
                                        <?php endif; ?>
                                        <a href="<?php echo e(route('download_manufacture_details', encrypt_decrypt($value->id, 'encrypt'))); ?>"
                                            class="button-info" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="<?php echo app('translator')->get('index.download'); ?>"><i class="fa fa-download"></i></a>
                                        <?php if(routePermission('manufacture.print')): ?>
                                        <a href="javascript:void();" target="_blank" data-id="<?php echo e($value->id); ?>"
                                            class="button-info print_invoice" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="<?php echo app('translator')->get('index.print'); ?>"><i
                                                class="fa fa-print"></i></a>
                                        <?php endif; ?>
                                        <?php if($value->manufacture_status != 'done'): ?>
                                            <?php if(routePermission('manufacture.delete')): ?>
                                                <a href="#" class="delete button-danger"
                                                    data-form_class="alertDelete<?php echo e($value->id); ?>" type="submit"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="<?php echo app('translator')->get('index.delete'); ?>">
                                                    <form action="<?php echo e(route('productions.destroy', $value->id)); ?>"
                                                        class="alertDelete<?php echo e($value->id); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <i class="c_padding_13 fa fa-trash tiny-icon"></i>
                                                    </form>
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

        
        <div class="modal fade" id="changeStatusModal" aria-hidden="true" aria-labelledby="myModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><?php echo app('translator')->get('index.update_partially_done'); ?> </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                data-feather="x"></i></button>
                    </div>
                    <form action="<?php echo e(route('manufacture.changePartiallyDone')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <p><strong><?php echo app('translator')->get('index.total_quantity'); ?> : </strong> <span class="total_quantity"></span></p>
                            <p class="d-flex align-items-center"><strong><?php echo app('translator')->get('index.partially_done_quantity'); ?> : </strong>
                             <input type="number" name="partially_done_quantity" placeholder="Enter Partially Done Quantity"
                                    class="form-control partially_done_quantity w-50 ms-2" required>
                            </p>
                            <p><strong><?php echo app('translator')->get('index.remaining_quantity'); ?> : </strong> <span class="remaining_quantity"></span></p>
                            <input type="hidden" name="manufacture_id" class="manufacture_id">                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn bg-blue-btn"><?php echo app('translator')->get('index.update'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
        <div class="modal fade" id="updateProducedQuantity" aria-hidden="true" aria-labelledby="myModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><?php echo app('translator')->get('index.update_produced_quantity'); ?> </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                data-feather="x"></i></button>
                    </div>
                    <form action="<?php echo e(route('manufacture.updateProducedQuantity')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">

                            <table id="producedHistory" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('index.sn'); ?></th>
                                        <th><?php echo app('translator')->get('index.produced_quantity'); ?></th>
                                        <th><?php echo app('translator')->get('index.produced_date'); ?></th>
                                    </tr>
                                </thead>
                                <tbody class="producedHistoryBody">

                                </tbody>
                            </table>

                            <p><strong><?php echo app('translator')->get('index.remaining_produced'); ?> : </strong> <span class="remaining_quantity"></span></p>

                            <input type="hidden" name="manufacture_id" class="manufacture_id">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="produced_quantity"><?php echo app('translator')->get('index.produced_quantity'); ?></label>
                                    <input type="number" name="produced_quantity" class="form-control produced_quantity"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="produced_date"><?php echo app('translator')->get('index.produced_date'); ?></label>
                                    <input type="date" name="produced_date"
                                        class="form-control produced_date customDatepicker" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn bg-blue-btn"><?php echo app('translator')->get('index.update'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="filterModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('index.rm_stocks'); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo Form::model(isset($obj) && $obj ? $obj : '', [
                            'id' => 'add_form',
                            'method' => isset($obj) && $obj ? 'GET' : 'GET',
                            'enctype' => 'multipart/form-data',
                            'route' => ['productions.index'],
                        ]); ?>

                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-sm-12 mb-2">
                                <div class="form-group rmCatclass">
                                    <label><?php echo app('translator')->get('index.status'); ?> </label>
                                    <select name="status" class="form-control select2" id="status">
                                        <option value=""><?php echo app('translator')->get('index.select'); ?></option>
                                        <option <?php echo e($status == 'draft' ? 'selected' : ''); ?> value="draft">
                                            <?php echo app('translator')->get('index.draft'); ?></option>
                                        <option <?php echo e($status == 'inProgress' ? 'selected' : ''); ?> value="inProgress">
                                            <?php echo app('translator')->get('index.in_progress'); ?></option>
                                        <option <?php echo e($status == 'done' ? 'selected' : ''); ?> value="done">
                                            <?php echo app('translator')->get('index.done'); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div class="form-group rmCatclass">
                                    <label><?php echo app('translator')->get('index.product'); ?> </label>
                                    <select name="finish_p_id" class="form-control select2">
                                        <option value=""><?php echo app('translator')->get('index.select'); ?></option>
                                        <?php $__currentLoopData = $finishProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>"
                                                <?php echo e($product_id == $value->id ? 'selected' : ''); ?>>
                                                <?php echo e($value->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div class="form-group rmCatclass">
                                    <label><?php echo app('translator')->get('index.batch_no'); ?> </label>
                                    <input type="text" name="batch_no" class="form-control"
                                        value="<?php echo e($batch_no ?? ''); ?>" placeholder="Enter Batch no">
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div class="form-group rmCatclass">
                                    <label><?php echo app('translator')->get('index.customer'); ?> </label>
                                    <select name="customer" class="form-control select2">
                                        <option value=""><?php echo app('translator')->get('index.select'); ?></option>
                                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>"
                                                <?php echo e($customer == $value->id ? 'selected' : ''); ?>>
                                                <?php echo e($value->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2 subBtn">
                                <button type="submit" name="submit" value="submit"
                                    class="btn w-100 bg-blue-btn"><?php echo app('translator')->get('index.submit'); ?></button>
                            </div>

                        </div>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo $baseURL . 'assets/datatable_custom/jquery-3.3.1.js'; ?>"></script>
    <script src="<?php echo $baseURL . 'assets/dataTable/jquery.dataTables.min.js'; ?>"></script>
    <script src="<?php echo $baseURL . 'assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'; ?>"></script>
    <script src="<?php echo $baseURL . 'assets/dataTable/dataTables.bootstrap4.min.js'; ?>"></script>
    <script src="<?php echo $baseURL . 'assets/dataTable/dataTables.buttons.min.js'; ?>"></script>
    <script src="<?php echo $baseURL . 'assets/dataTable/buttons.html5.min.js'; ?>"></script>
    <script src="<?php echo $baseURL . 'assets/dataTable/buttons.print.min.js'; ?>"></script>
    <script src="<?php echo $baseURL . 'assets/dataTable/jszip.min.js'; ?>"></script>
    <script src="<?php echo $baseURL . 'assets/dataTable/pdfmake.min.js'; ?>"></script>
    <script src="<?php echo $baseURL . 'assets/dataTable/vfs_fonts.js'; ?>"></script>
    <script src="<?php echo $baseURL . 'frequent_changing/newDesign/js/forTable.js'; ?>"></script>
    <script src="<?php echo $baseURL . 'frequent_changing/js/custom_report.js'; ?>"></script>
    <script src="<?php echo $baseURL . 'frequent_changing/js/manufacture.js'; ?>"></script>    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sbg_product\resources\views/pages/manufacture/manufactures.blade.php ENDPATH**/ ?>