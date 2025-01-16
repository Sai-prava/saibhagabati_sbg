
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
                                <th class="w-1 text-left"><?php echo app('translator')->get('index.sn'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.name'); ?>(<?php echo app('translator')->get('index.code'); ?>)</th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.category'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.stock_segmentation'); ?></th>
                                <th class="width_10_p text-center"><?php echo app('translator')->get('index.available_quantity'); ?></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.sale_price'); ?> <i data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="<?php echo app('translator')->get('index.product_stock_price_calculate'); ?>"
                                        class="fa fa-question-circle base_color c_pointer"></i></th>
                                <th class="width_10_p"><?php echo app('translator')->get('index.value'); ?> (<?php echo app('translator')->get('index.available_quantity'); ?> x <?php echo app('translator')->get('index.sale_price'); ?>)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($obj && !empty($obj)): ?>
                                <?php
                                $i = count($obj);
                                $grandTotal = 0;
                                ?>
                            <?php endif; ?>
                            <?php $__currentLoopData = $obj; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-left"><?php echo e($i--); ?></td>
                                    <td><?php echo e($value->name); ?>(<?php echo e($value->code); ?>)</td>
                                    <td><?php echo e(getFPCategory($value->category)); ?></td>
                                    <td><?php if(count(expiryDateProduct($value->id)) > 0): ?>
                                        <div id="stockInnerTable">
                                            <ul>
                                                <li>
                                                    <div class="w-50"><?php echo app('translator')->get('index.expiry_date'); ?></div>
                                                    <div class="w-50 text-end"><?php echo app('translator')->get('index.quantity'); ?></div>
                                                </li>
                                                <?php $__currentLoopData = expiryDateProduct($value->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <div class="stock-alert-color w-50">
                                                            <?php echo e(getDateFormat(expireDate($history->complete_date, $history->expiry_days))); ?>

                                                        </div>
                                                        <div class="stock-alert-color w-50 text-end">
                                                            <?php echo e($history->product_quantity); ?><?php echo app('translator')->get('index.pcs'); ?>
                                                        </div>                                                        
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </ul>
                                        </div>
                                        <?php elseif(count(batchControlProduct($value->id)) > 0): ?>
                                        <div id="stockInnerTable">
                                            <ul>
                                                <li>
                                                    <div class="w-50"><?php echo app('translator')->get('index.batch_no'); ?></div>
                                                    <div class="w-50 text-end"><?php echo app('translator')->get('index.quantity'); ?></div>
                                                </li>
                                                <?php $__currentLoopData = batchControlProduct($value->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <div class="stock-alert-color w-50">
                                                            <?php echo e($history->batch_no); ?>

                                                        </div>
                                                        <div class="stock-alert-color w-50 text-end">
                                                            <?php echo e($history->product_quantity); ?><?php echo app('translator')->get('index.pcs'); ?>
                                                        </div>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                        <?php else: ?>
                                        <?php echo app('translator')->get('index.not_available'); ?>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center"><?php echo e(getCurrentProductStock($value->id)); ?><?php echo app('translator')->get('index.pcs'); ?></td>
                                    <td><?php echo e(getAmtCustom(productSalePrice($value->id))); ?></td>
                                    <td>
                                        <?php
                                        $total = $value->current_total_stock * productSalePrice($value->id);
                                        $grandTotal += $total;
                                        echo getAmtCustom($total);
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tr>
                            <th class="c_center"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><?php echo app('translator')->get('index.total'); ?>=</th>
                            <th><?php echo e(getAmtCustom($grandTotal)); ?></th>
                        </tr>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\saibhagabati\resources\views/pages/finished_product/product_stock.blade.php ENDPATH**/ ?>