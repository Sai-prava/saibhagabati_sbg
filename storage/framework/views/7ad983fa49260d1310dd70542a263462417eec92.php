
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
                    <input type="hidden" class="datatable_name" data-title="<?php echo e(isset($title) && $title ? $title : ''); ?>"
                        data-id_name="datatable">
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
                                <th class="width_10_p"><?php echo app('translator')->get('index.date'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.supplier'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.g_total'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.paid'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.due'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.type'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.status'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.added_by'); ?></th>
                                <th class="width_3_p"><?php echo app('translator')->get('index.actions'); ?></th>
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
                                    <td><?php echo e($value->reference_no); ?></td>
                                    <td><?php echo e(getDateFormat($value->date)); ?></td>
                                    <td><?php echo e(getSupplierName($value->supplier)); ?></td>
                                    <td><?php echo e(getCurrency($value->grand_total)); ?></td>
                                    <td><?php echo e(getCurrency($value->paid)); ?></td>
                                    <td><?php echo e(getCurrency($value->due)); ?></td>
                                    <td><?php echo e($value->type == 'purchase_order' ? 'Purchase Order' : 'Purchase'); ?></td>
                                    <td><?php echo e($value->status); ?></td>
                                    <td><?php echo e(getUserName($value->added_by)); ?></td>
                                    <?php if($value->status == 'Final'): ?>
                                        <td>
                                            <?php if(routePermission('purchase.view')): ?>
                                                <a href="<?php echo e(url('rawmaterialpurchases')); ?>/<?php echo e(encrypt_decrypt($value->id, 'encrypt')); ?>"
                                                    class="button-info" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="<?php echo app('translator')->get('index.view_details'); ?>"><i class="fa fa-eye tiny-icon"></i></a>
                                            <?php endif; ?>
                                            <?php if(routePermission('purchase.print')): ?>
                                                <a href="javascript:void();" class="button-info print_invoice"
                                                    data-id="<?php echo e($value->id); ?>" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="<?php echo app('translator')->get('index.print_invoice'); ?>"><i
                                                        class="fa fa-print tiny-icon"></i></a>
                                            <?php endif; ?>
                                            <?php if(routePermission('purchase.download')): ?>
                                                <a href="<?php echo e(route('download_purchase_invoice', encrypt_decrypt($value->id, 'encrypt'))); ?>"
                                                    target="_blank" class="button-info" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="<?php echo app('translator')->get('index.download_invoice'); ?>"><i
                                                        class="fa fa-download tiny-icon"></i></a>
                                            <?php endif; ?>
                                            <?php if(routePermission('purchase.generate')): ?>
                                                <?php if($value->type == 'purchase_order'): ?>
                                                    <a href="<?php echo e(route('generate_purchase', encrypt_decrypt($value->id, 'encrypt'))); ?>"
                                                        target="_blank" class="button-info" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="<?php echo app('translator')->get('index.generate_purchase_from_purchase_order'); ?>"><i
                                                            class="fa fa-clone tiny-icon"></i></a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <?php if(routePermission('purchase.delete')): ?>
                                                <a href="#" class="delete button-danger"
                                                    data-form_class="alertDelete<?php echo e($value->id); ?>" type="submit"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="<?php echo app('translator')->get('index.delete'); ?>">
                                                    <form action="<?php echo e(route('rawmaterialpurchases.destroy', $value->id)); ?>"
                                                        class="alertDelete<?php echo e($value->id); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <i class="fa fa-trash tiny-icon"></i>
                                                    </form>
                                                </a>
                                            <?php endif; ?>

                                        </td>
                                    <?php else: ?>
                                        <td class="ir_txt_center">
                                            <a href="<?php echo e(url('rawmaterialpurchases')); ?>/<?php echo e(encrypt_decrypt($value->id, 'encrypt')); ?>/edit"
                                                class="button-success" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="<?php echo app('translator')->get('index.edit'); ?>"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo e(url('rawmaterialpurchases')); ?>/<?php echo e(encrypt_decrypt($value->id, 'encrypt')); ?>"
                                                class="button-info" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="<?php echo app('translator')->get('index.view_details'); ?>"><i class="fa fa-eye tiny-icon"></i></a>
                                            <a href="javascript:void();" class="button-info print_invoice"
                                                data-id="<?php echo e($value->id); ?>" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="<?php echo app('translator')->get('index.print_invoice'); ?>"><i
                                                    class="fa fa-print tiny-icon"></i></a>
                                            <a href="<?php echo e(route('download_purchase_invoice', encrypt_decrypt($value->id, 'encrypt'))); ?>"
                                                target="_blank" class="button-info" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="<?php echo app('translator')->get('index.download_invoice'); ?>"><i
                                                    class="fa fa-download tiny-icon"></i></a>
                                            <a href="#" class="delete button-danger"
                                                data-form_class="alertDelete<?php echo e($value->id); ?>" type="submit"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('index.delete'); ?>">
                                                <form action="<?php echo e(route('rawmaterialpurchases.destroy', $value->id)); ?>"
                                                    class="alertDelete<?php echo e($value->id); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <i class="c_padding_13 fa fa-trash tiny-icon"></i>
                                                </form>
                                            </a>

                                        </td>
                                    <?php endif; ?>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
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
    <script src="<?php echo $baseURL . 'frequent_changing/js/purchase.js'; ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\saibhagabati\resources\views/pages/purchase/purchases.blade.php ENDPATH**/ ?>