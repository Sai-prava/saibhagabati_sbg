
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
                                <th class="w-1"><?php echo app('translator')->get('index.sn'); ?></th>
                                <th class="w-5"><?php echo app('translator')->get('index.manufacture'); ?></th>
                                <th class="w-5"><?php echo app('translator')->get('index.product'); ?></th>
                                <th class="w-5"><?php echo app('translator')->get('index.total_loss'); ?></th>
                                <th class="w-40"><?php echo app('translator')->get('index.loss_product_materials'); ?></th>
                                <th class="w-10"><?php echo app('translator')->get('index.loss_percent'); ?></th>
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
                                    <td><?php echo e($value->product->name); ?></td>
                                    <td><?php echo e($value->production_loss != null ? getCurrency($value->production_loss) : 0); ?></td>
                                    <td>
                                        <div id="stockInnerTable">
                                            <ul>
                                                <li>
                                                    <div><?php echo app('translator')->get('index.product'); ?></div>
                                                </li>
                                                <li>
                                                    <div class="w-50"><?php echo app('translator')->get('index.product'); ?></div>
                                                    <div class="w-25"><?php echo app('translator')->get('index.quantity'); ?></div>
                                                    <div class="w-25"><?php echo app('translator')->get('index.loss_amount'); ?></div>
                                                </li>
                                                <?php $__currentLoopData = $value->productWaste; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php $__currentLoopData = $product->productItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li>
                                                            <div class="stock-alert-color w-50">
                                                                <?php echo e(getFinishProduct($item->finish_product_id)); ?>

                                                            </div>
                                                            <div class="stock-alert-color w-25">
                                                                <?php echo e($item->fp_waste_amount); ?>

                                                            </div>
                                                            <div class="stock-alert-color w-25">
                                                                <?php echo e(getCurrency($item->loss_amount)); ?></div>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <li class="fw-bold">
                                                    <div><?php echo app('translator')->get('index.raw_material'); ?></div>
                                                </li>
                                                <li>
                                                    <div class="w-50"><?php echo app('translator')->get('index.material_name'); ?></div>
                                                    <div class="w-25"><?php echo app('translator')->get('index.quantity'); ?></div>
                                                    <div class="w-25"><?php echo app('translator')->get('index.loss_amount'); ?></div>
                                                </li>
                                                <?php $__currentLoopData = $value->materialWaste; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <div class="stock-alert-color w-50">
                                                            <?php echo e(getRMName($item->rmaterials_id)); ?>

                                                        </div>
                                                        <div class="stock-alert-color w-25">
                                                            <?php echo e($item->waste_amount); ?>

                                                        </div>
                                                        <div class="stock-alert-color w-25">
                                                            <?php echo e(getCurrency($item->loss_amount)); ?></div>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="stockInnerTable">
                                            <ul>
                                                <li>
                                                    <div><?php echo app('translator')->get('index.product_waste'); ?></div>
                                                    <div><?php echo e($value->getWastePercentage()['product']); ?></div>
                                                </li>
                                                <li class="fw-bold">
                                                    <div><?php echo app('translator')->get('index.raw_material_waste'); ?></div>
                                                    <div><?php echo e($value->getWastePercentage()['raw_material']); ?></div>
                                                </li>                                               
                                                
                                            </ul>
                                        </div>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\saibhagabati\resources\views/pages/production_loss/production_loss_report.blade.php ENDPATH**/ ?>