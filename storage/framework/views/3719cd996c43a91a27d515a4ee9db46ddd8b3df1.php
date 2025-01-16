
<?php $__env->startSection('content'); ?>
    <?php
    $baseURL = getBaseURL();
    $setting = getSettingsInfo();
    $base_color = '#6ab04c';
    if (isset($setting->base_color) && $setting->base_color) {
        $base_color = $setting->base_color;
    }
    ?>
    <link rel="stylesheet" href="<?php echo $baseURL . 'assets/dist/css/custom/dashboard.css'; ?>">
    <input type="hidden" name="six_month" id="six_month_value" value="<?php echo app('translator')->get('index.6_month'); ?>">
    <input type="hidden" name="one_year" id="one_year_value" value="<?php echo app('translator')->get('index.12_month'); ?>">
    <input type="hidden" name="purchase_text" id="purchase_text_value" value="<?php echo app('translator')->get('index.purchase'); ?>">
    <input type="hidden" name="supplier_due_payment_text" id="supplier_due_payment_text_value" value="<?php echo app('translator')->get('index.supplier_payment'); ?>">
    <input type="hidden" name="non_inventory_cost_text" id="non_inventory_cost_text_value" value="<?php echo app('translator')->get('index.non_inventory_cost'); ?>">
    <input type="hidden" name="sale_text" id="sale_text_value" value="<?php echo app('translator')->get('index.sale'); ?>">
    <input type="hidden" name="customer_due_received_text" id="customer_due_received_text_value" value="<?php echo app('translator')->get('index.customer_due_received'); ?>">
    <input type="hidden" name="expense_text" id="expense_text_value" value="<?php echo app('translator')->get('index.expense'); ?>">
    <input type="hidden" name="payroll_text" id="payroll_text_value" value="<?php echo app('translator')->get('index.payroll'); ?>">

    <!-- Main content -->
    <section class="main-content-wrapper dashboard-wrapper">
        <?php if(appMode() == 'demo'): ?>
            <section class="alert-wrapper">
                <div class="alert alert-danger alert-dismissible show">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div class="alert-body">
                        <i class="m-right fa fa-triangle-exclamation"></i> <?php echo app('translator')->get('index.demo_instruction'); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <?php echo $__env->make('utilities.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <section class="content-header dashboard_content_header my-2">
            <h3 class="top-left-header">
                <span><?php echo app('translator')->get('index.dashboard'); ?></span>
            </h3>
        </section>

        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <a class="text-dec-none" href="<?php echo e(route('finishedproducts.index')); ?>">
                    <div class="small-box box4column">
                        <div class="inner b-l-primary">
                            <p><?php echo app('translator')->get('index.total_product'); ?></p>
                            <h3><?php echo e(numberFormat($total['product'])); ?></h3>
                        </div>
                        <div class="icon">
                            <img src="<?php echo $baseURL . 'frequent_changing/images/products.png'; ?>" alt=""
                                class="">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6">
                <a class="text-dec-none" href="<?php echo e(route('rawmaterials.index')); ?>">
                    <div class="small-box box4column">
                        <div class="inner b-l-secondary">
                            <p><?php echo app('translator')->get('index.total_rm'); ?></p>
                            <h3><?php echo e(numberFormat($total['rm'])); ?></h3>
                        </div>
                        <div class="icon">
                            <img src="<?php echo $baseURL . 'frequent_changing/images/raw-materials.png'; ?>" alt=""
                                class="">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6">
                <a class="text-dec-none" href="<?php echo e(route('suppliers.index')); ?>">
                    <div class="small-box box4column">
                        <div class="inner b-l-danger">
                            <p><?php echo app('translator')->get('index.total_supplier'); ?></p>
                            <h3><?php echo e(numberFormat($total['supplier'])); ?>

                            </h3>
                        </div>
                        <div class="icon">
                            <img src="<?php echo $baseURL . 'frequent_changing/images/supplier.png'; ?>" alt=""
                                class="">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6">
                <a class="text-dec-none" href="<?php echo e(route('customers.index')); ?>">
                    <div class="small-box box4column">
                        <div class="inner b-l-success">
                            <p><?php echo app('translator')->get('index.total_customer'); ?></p>
                            <h3><?php echo e(numberFormat($total['customer'])); ?></h3>
                        </div>
                        <div class="icon">
                            <img src="<?php echo $baseURL . 'frequent_changing/images/customer.png'; ?>" alt=""
                                class="">
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row grap-row">
            <div class="col-xl-8 col-xs-12">
                <div class="card graph_card">
                    <div class="d-flex justify-content-between">
                        <h3 class="custom-card-title mb-0 mt-2 ms-3"><iconify-icon
                                icon="solar:chart-broken"></iconify-icon><span class="ms-2"><?php echo app('translator')->get('index.money_flow_comparison'); ?></span>
                            (<span id="month_span"><?php echo app('translator')->get('index.six_month'); ?></span>)
                        </h3>
                        <div class="me-2 w-25 mt-2">
                            <select name="filter_chart_name" id="filter_chart_month" class="form-control me-2">
                                <option value="6"><?php echo app('translator')->get('index.6_month'); ?></option>
                                <option value="12"><?php echo app('translator')->get('index.12_month'); ?></option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive responsive-table graphTable">
                            <canvas id="dashboardGraph"></canvas>
                        </div>
                    </div>
                </div>
                <!--table-responsive-->
            </div>
            <div class="col-xl-4 col-xs-12">
                <div class="card">
                    <div class="d-flex justify-content-between">
                        <h3 class="custom-card-title mb-0 mt-2 ms-3"><iconify-icon
                                icon="solar:pie-chart-2-broken"></iconify-icon><span
                                class="ms-2"><?php echo app('translator')->get('index.account_balance'); ?></span>
                        </h3>

                    </div>

                    <div class="card-body">
                        <div class="responsive-table balanceGraph">
                            <div id="balanceGraph"></div>
                        </div>
                    </div>
                </div>
                <!--table-responsive-->
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="box-wrapper">
                    <div class="box-header with-border">
                        <h3 class="box-title"><iconify-icon icon="solar:database-broken"></iconify-icon><span
                                class="ms-2"><?php echo app('translator')->get('index.running_productions'); ?></span></h3>
                        <input type="hidden" class="datatable_name"
                            data-title="<?php echo e(isset($title) && $title ? $title : ''); ?>" data-id_name="datatable_1">
                    </div>
                    <div class="table-box mt-2">
                        <!-- /.box-header -->
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped datatable_dashboard">
                                <thead>
                                    <tr>
                                        <th class="width_1_p"><?php echo app('translator')->get('index.reference_no'); ?></th>
                                        <th class="width_13_p"><?php echo app('translator')->get('index.product'); ?></th>
                                        <th class="width_13_p"><?php echo app('translator')->get('index.start_date'); ?></th>
                                        <th class="width_20_p"><?php echo app('translator')->get('index.consumed_time'); ?></th>
                                        <th class="width_26_p"><?php echo app('translator')->get('index.manufacture_cost'); ?></th>
                                        <th class="width_13_p"><?php echo app('translator')->get('index.sale_price'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $running_production; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(safe($value->reference_no)); ?></td>
                                            <td><?php echo e(safe(getProductNameById($value->product_id))); ?></td>
                                            <td><?php echo e(safe(getDateFormat($value->start_date))); ?></td>
                                            <td><?php echo e(safe($value->consumed_time)); ?></td>
                                            <td><?php echo e(safe(getCurrency($value->mtotal_cost))); ?></td>
                                            <td><?php echo e(safe(getCurrency($value->msale_price))); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="box-wrapper">
                    <div class="box-header with-border">
                        <h3 class="box-title"><iconify-icon icon="solar:database-broken"></iconify-icon><span
                                class="ms-2"><?php echo app('translator')->get('index.running_customer_order'); ?></span></h3>
                        <input type="hidden" class="datatable_name"
                            data-title="<?php echo e(isset($title) && $title ? $title : ''); ?>" data-id_name="datatable_2">
                    </div>
                    <div class="table-box mt-2">
                        <!-- /.box-header -->
                        <div class="table-responsive">
                            <table id="datatable_2" class="table table-striped datatable_dashboard">
                                <thead>
                                    <tr>
                                        <th class="width_1_p"><?php echo app('translator')->get('index.reference_no'); ?></th>
                                        <th class="width_13_p"><?php echo app('translator')->get('index.customer'); ?></th>
                                        <th class="width_13_p"><?php echo app('translator')->get('index.delivery_date'); ?></th>
                                        <th class="width_20_p"><?php echo app('translator')->get('index.total_amount'); ?></th>
                                        <th class="width_26_p"><?php echo app('translator')->get('index.total_cost'); ?></th>
                                        <th class="width_13_p"><?php echo app('translator')->get('index.total_profit'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $running_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(safe($value->reference_no)); ?></td>
                                            <td><?php echo e(safe(getCustomerNameById($value->customer_id))); ?></td>
                                            <td><?php echo e(safe(getDateFormat($value->delivery_date))); ?></td>
                                            <td><?php echo e(safe(getCurrency($value->total_amount))); ?></td>
                                            <td><?php echo e(safe(getCurrency($value->total_cost))); ?></td>
                                            <td><?php echo e(safe(getCurrency($value->total_profit))); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>

                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="box-wrapper">
                    <div class="box-header with-border">
                        <h3 class="box-title"><iconify-icon icon="solar:danger-broken"></iconify-icon><span
                                class="ms-2"><?php echo app('translator')->get('index.low_raw_materials_in_stocks'); ?></span></h3>
                        <input type="hidden" class="datatable_name"
                            data-title="<?php echo e(isset($title) && $title ? $title : ''); ?>" data-id_name="datatable_3">
                    </div>
                    <div class="table-box mt-2">
                        <!-- /.box-header -->
                        <div class="table-responsive">
                            <table id="datatable_3" class="table table-striped datatable_dashboard">
                                <thead>
                                    <tr>
                                        <th class="width_1_p"><?php echo app('translator')->get('index.code'); ?></th>
                                        <th class="width_13_p"><?php echo app('translator')->get('index.material_name'); ?></th>
                                        <th class="width_13_p"><?php echo app('translator')->get('index.current_stock'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $lowRawMaterialStocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(safe($value->code)); ?></td>
                                            <td><?php echo e(safe($value->name)); ?></td>
                                            <td><?php echo e($value->total_stock); ?> <?php echo e(getRMUnitById($value->unit)); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="box-wrapper">
                    <div class="box-header with-border">
                        <h3 class="box-title"><iconify-icon icon="solar:close-circle-broken"></iconify-icon><span
                                class="ms-2"><?php echo app('translator')->get('index.close_to_expire_finished_product'); ?></span></h3>
                        <input type="hidden" class="datatable_name"
                            data-title="<?php echo e(isset($title) && $title ? $title : ''); ?>" data-id_name="datatable_4">
                    </div>
                    <div class="table-box mt-2">
                        <!-- /.box-header -->
                        <div class="table-responsive">
                            <table id="datatable_4" class="table table-striped datatable_dashboard">
                                <thead>
                                    <tr>
                                        <th class="width_1_p"><?php echo app('translator')->get('index.manufacture'); ?></th>
                                        <th class="width_1_p"><?php echo app('translator')->get('index.name'); ?></th>
                                        <th class="width_13_p"><?php echo app('translator')->get('index.code'); ?></th>
                                        <th class="width_13_p"><?php echo app('translator')->get('index.expiry_date'); ?></th>
                                        <th class="width_13_p"><?php echo app('translator')->get('index.status'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $mergedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(safe($value->reference_no)); ?></td>
                                            <td><?php echo e(safe($value->product->name)); ?></td>
                                            <td><?php echo e(safe($value->product->code)); ?></td>
                                            <td><?php echo e(safe(getDateFormat($value->expiry_date))); ?></td>
                                            <td><?php echo e(safe($value->status)); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>

                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="box-wrapper">
                    <div class="box-header with-border">
                        <h3 class="box-title"><iconify-icon icon="solar:card-send-broken"></iconify-icon><span
                                class="ms-2"><?php echo app('translator')->get('index.supplier_receivables'); ?></span></h3>
                        <input type="hidden" class="datatable_name"
                            data-title="<?php echo e(isset($title) && $title ? $title : ''); ?>" data-id_name="datatable_5">
                    </div>
                    <div class="table-box mt-2">
                        <!-- /.box-header -->
                        <div class="table-responsive">
                            <table id="datatable_5" class="table table-striped datatable_dashboard">
                                <thead>
                                    <tr>
                                        <th class="width_1_p"><?php echo app('translator')->get('index.date'); ?></th>
                                        <th class="width_13_p"><?php echo app('translator')->get('index.supplier'); ?></th>
                                        <th class="width_13_p"><?php echo app('translator')->get('index.amount'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $supplierPayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(safe(getDateFormat($value->date))); ?></td>
                                            <td><?php echo e(safe(getSupplierName($value->supplier))); ?></td>
                                            <td><?php echo e(getAmtCustom($value->amount)); ?> </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="box-wrapper">
                    <div class="box-header with-border">
                        <h3 class="box-title"><iconify-icon icon="solar:card-recive-broken"></iconify-icon><span
                                class="ms-2"><?php echo app('translator')->get('index.customer_payable'); ?></span></h3>
                        <input type="hidden" class="datatable_name"
                            data-title="<?php echo e(isset($title) && $title ? $title : ''); ?>" data-id_name="datatable_6">
                    </div>
                    <div class="table-box mt-2">
                        <!-- /.box-header -->
                        <div class="table-responsive">
                            <table id="datatable_6" class="table table-striped datatable_dashboard">
                                <thead>
                                    <tr>
                                        <th class="width_1_p"><?php echo app('translator')->get('index.reference_no'); ?></th>
                                        <th class="width_13_p"><?php echo app('translator')->get('index.date'); ?></th>
                                        <th class="width_13_p"><?php echo app('translator')->get('index.customer'); ?></th>
                                        <th class="width_20_p"><?php echo app('translator')->get('index.amount'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $customerPayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(safe($value->reference_no)); ?></td>
                                            <td><?php echo e(safe(getDateFormat($value->only_date))); ?></td>
                                            <td><?php echo e(safe(getCustomerNameById($value->customer_id))); ?></td>
                                            <td><?php echo e(getAmtCustom($value->amount)); ?> </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo $baseURL . 'assets/datatable_custom/jquery.min.js'; ?>"></script>
    <script src="<?php echo $baseURL . 'assets/dataTable/jquery.dataTables.min.js'; ?>"></script>
    <script src="<?php echo $baseURL . 'assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'; ?>"></script>
    <script src="<?php echo $baseURL . 'assets/dataTable/dataTables.bootstrap5.min.js'; ?>"></script>
    <script src="<?php echo $baseURL . 'assets/dataTable/dataTables.buttons.min.js'; ?>"></script>
    <script src="<?php echo $baseURL . 'assets/dataTable/buttons.html5.min.js'; ?>"></script>
    <script src="<?php echo $baseURL . 'assets/dataTable/buttons.print.min.js'; ?>"></script>
    <script src="<?php echo $baseURL . 'assets/dataTable/jszip.min.js'; ?>"></script>
    <script src="<?php echo $baseURL . 'assets/dataTable/pdfmake.min.js'; ?>"></script>
    <script src="<?php echo $baseURL . 'assets/dataTable/vfs_fonts.js'; ?>"></script>
    <script src="<?php echo $baseURL . 'frequent_changing/newDesign/js/forTable.js'; ?>"></script>
    <script src="<?php echo $baseURL . 'frequent_changing/js/custom_report.js'; ?>"></script>
    <!-- Chart Js plugin -->
    <script src="<?php echo $baseURL . 'assets/chart/chart.js'; ?>"></script>
    <script src="<?php echo $baseURL . 'frequent_changing/js/canvasjs.min.js'; ?>"></script>
    <script src="<?php echo $baseURL . 'frequent_changing/js/custom_dashboard.js'; ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\saibhagabati\resources\views/pages/dashboard.blade.php ENDPATH**/ ?>