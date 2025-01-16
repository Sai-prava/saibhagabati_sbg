
<?php $__env->startSection('content'); ?>
    <?php
    $baseURL = getBaseURL();
    $setting = getSettingsInfo();
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
                <div class="table-responsive">
                    <table id="datatable" class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="ir_w_1"><?php echo app('translator')->get('index.sn'); ?></th>
                                <th class="ir_w_12"><?php echo app('translator')->get('index.name'); ?></th>
                                <th class="ir_w_12"><?php echo app('translator')->get('index.designation'); ?></th>
                                <th class="ir_w_12"><?php echo app('translator')->get('index.email'); ?></th>
                                <th class="ir_w_12"><?php echo app('translator')->get('index.phone'); ?></th>
                                <th class="ir_w_12"><?php echo app('translator')->get('index.roles'); ?></th>
                                <th class="ir_w_12"><?php echo app('translator')->get('index.status'); ?></th>

                                <th class="ir_w_1_txt_center"><?php echo app('translator')->get('index.actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $obj; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="ir_txt_center"><?php echo e(++$key); ?></td>
                                    <td><?php echo e($value->user_name ?? ''); ?></td>
                                    <td><?php echo e($value->designation ?? ''); ?></td>
                                    <td><?php echo e($value->email ?? ''); ?></td>
                                    <td><?php echo e($value->phone_number ?? ''); ?></td>
                                    <td><?php echo e(getRolePermissionName($value->permission_role) ?? 'N/A'); ?></td>
                                    <td>
                                        <span
                                            class="text-<?php echo e($value->status == 'Active' ? 'success' : 'danger'); ?>"><?php echo e($value->status); ?></span>
                                    </td>

                                    <td class="ir_txt_center">
                                        <?php if(routePermission('user.edit')): ?>
                                            <a href="<?php echo e(route('user.edit', encrypt_decrypt($value->id, 'encrypt'))); ?>" class="button-success"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="<?php echo app('translator')->get('index.edit'); ?>"><i class="fa fa-edit"></i></a>
                                        <?php endif; ?>
                                        <?php if(routePermission('user.delete')): ?>
                                            <a href="#" class="delete button-danger"
                                                data-form_class="alertDelete<?php echo e($value->id); ?>" type="submit"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('index.delete'); ?>">
                                                <form action="<?php echo e(route('user.destroy', $value)); ?>"
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\saibhagabati\resources\views/pages/user/index.blade.php ENDPATH**/ ?>