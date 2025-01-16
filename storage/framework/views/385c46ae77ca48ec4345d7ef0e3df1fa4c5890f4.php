
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
                                <th class="width_10_p"><?php echo app('translator')->get('index.customer'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.date'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.subtotal'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.discount'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.other'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.grand_total'); ?></th>
                                <th class="width_3_p ir_txt_center"><?php echo app('translator')->get('index.actions'); ?></th>
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
                                    <td><?php echo e(getCustomerNameById($value->customer_id)); ?></td>
                                    <td><?php echo e(getDateFormat($value->date)); ?></td>
                                    <td><?php echo e(getCurrency($value->subtotal)); ?></td>
                                    <td><?php echo e($value->discount != null ? getCurrency($value->discount) : 0); ?></td>
                                    <td><?php echo e(getCurrency($value->other)); ?></td>
                                    <td><?php echo e(getCurrency($value->grand_total)); ?></td>
                                    <td class="ir_txt_center">
                                        <?php if(routePermission('quotations.edit')): ?>
                                            <a href="<?php echo e(url('quotation')); ?>/<?php echo e(encrypt_decrypt($value->id, 'encrypt')); ?>/edit"
                                                class="button-success" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="<?php echo app('translator')->get('index.edit'); ?>"><i class="fa fa-edit"></i></a>
                                        <?php endif; ?>
                                        <a href="<?php echo e(url('quotation')); ?>/<?php echo e(encrypt_decrypt($value->id, 'encrypt')); ?>" class="button-info"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('index.view_details'); ?>"><i
                                                class="fa fa-eye"></i></a>
                                        <a href="<?php echo e(route('download-quotation', encrypt_decrypt($value->id, 'encrypt'))); ?>" class="button-info"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('index.download'); ?>"><i
                                                class="fa fa-download"></i></a>
                                        <?php if(routePermission('quotations.delete')): ?>
                                            <a href="#" class="delete button-danger"
                                                data-form_class="alertDelete<?php echo e($value->id); ?>" type="submit"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('index.delete'); ?>">
                                                <form action="<?php echo e(route('quotation.destroy', $value->id)); ?>"
                                                    class="alertDelete<?php echo e($value->id); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <i class="c_padding_13 fa fa-trash tiny-icon"></i>
                                                </form>
                                            </a>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\saibhagabati\resources\views/pages/quotation/index.blade.php ENDPATH**/ ?>