<?php
$baseURL = getBaseURL();
$setting = getSettingsInfo();
$whiteLabelInfo = getWhiteLabelInfo();
$base_color = '#6ab04c';
if (isset($setting->base_color) && $setting->base_color) {
    $base_color = $setting->base_color;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo e(isset($whiteLabelInfo->site_title) ? $whiteLabelInfo->site_title : config('app.name')); ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo $baseURL . 'assets/bower_components/select2/dist/css/select2.min.css'; ?>">

    <link rel="stylesheet" href="<?php echo $baseURL . 'assets/plugins/iCheck/all.css'; ?>">
    <link rel="stylesheet" href="<?php echo $baseURL . 'assets/customCSS/custom.css'; ?>?v=1.1">
    <link rel="stylesheet" href="<?php echo $baseURL . 'frequent_changing/css/custom_css.css'; ?>?v=1.1">


    <link rel="stylesheet" href="<?php echo $baseURL . 'assets/bower_components/sweetalert2/dist/sweetalert.min.css'; ?>">

    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?php echo $baseURL . 'assets/bower_components/datepicker/datepicker.css'; ?>">


    <!-- Bootstrap 5.0.0 -->
    <link rel="stylesheet" href="<?php echo $baseURL . 'assets/bower_components/bootstrap-new/bootstrap.min.css'; ?>">

    <!-- New Admin Panel Design -->
    <link rel="stylesheet" href="<?php echo $baseURL . 'frequent_changing/newDesign/style_v1.css'; ?>?v=1.1">
    <link rel="stylesheet" href="<?php echo $baseURL . 'frequent_changing/css/responsive_v1.css'; ?>?v=1.1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $baseURL . 'assets/bower_components/font-awesome/css/all.min.css'; ?>">

    <link rel="stylesheet" href="<?php echo $baseURL . 'assets/dist/css/jquery.mCustomScrollbar.css'; ?>">

    <link rel="stylesheet" href="<?php echo $baseURL . 'assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.css'; ?>">


    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo $baseURL .
        (isset($whiteLabelInfo->favicon)
            ? 'uploads/white_label/' . $whiteLabelInfo->favicon
            : 'assets/branding/favicon.ico'); ?>" type="image/x-icon">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $baseURL . 'assets/dist/css/AdminLTE.css'; ?>">
    <link rel="stylesheet" href="<?php echo $baseURL . 'assets/dist/css/common.css'; ?>">
    <link rel="stylesheet" href="<?php echo $baseURL . 'assets/plugins/nice-select/css/nice-select.css'; ?>">
    <link rel="stylesheet" href="<?php echo $baseURL . 'frequent_changing/css/preloader.css'; ?>">

    <!-- Google Font -->
    <link rel="stylesheet" href="<?php echo $baseURL . 'assets/plugins/local/google_font.css'; ?>">
    <link rel="stylesheet" href="<?php echo $baseURL . 'frequent_changing/css/custom_tooltip.css'; ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<?php
$is_collapse = session('is_collapse') ?? 'No';
?>
<div class="loader"></div>

<body class="hold-transition skin-blue sidebar-mini <?php echo e(isset($is_collapse) && $is_collapse == 'No' ? '' : 'sidebar-collapse'); ?>">
    <input type="hidden" name="datatable_showing" id="datatable_showing" value="<?php echo app('translator')->get('index.showing'); ?>">
    <input type="hidden" name="Showing_to" id="Showing_to" value="<?php echo app('translator')->get('index.to'); ?>">
    <input type="hidden" name="Showing_from" id="Showing_from" value="<?php echo app('translator')->get('index.from'); ?>">
    <input type="hidden" name="Showing_entries" id="Showing_entries" value="<?php echo app('translator')->get('index.entries'); ?>">
    <input type="hidden" name="First" id="show_First" value="<?php echo app('translator')->get('index.first'); ?>">
    <input type="hidden" name="Last" id="show_Last" value="<?php echo app('translator')->get('index.last'); ?>">
    <input type="hidden" name="Next" id="show_Next" value="<?php echo app('translator')->get('index.next'); ?>">
    <input type="hidden" name="Prev" id="show_Prev" value="<?php echo app('translator')->get('index.prev'); ?>">
    <input type="hidden" name="no_data_in_table" id="no_data_in_table" value="<?php echo app('translator')->get('index.no_data_in_table'); ?>">
    <input type="hidden" name="no_match_data_in_table" id="no_match_data_in_table" value="<?php echo app('translator')->get('index.no_match_data'); ?>">
    <input type="hidden" id="default_currency" value="<?php echo e($setting->currency); ?>" />
    <input type="hidden" name="hidden_currency" class="hidden_currency" id="hidden_currency"
        value="<?php echo e($setting->currency); ?>">
    <input type="hidden" name="hidden_base_url" class="hidden_base_url" id="hidden_base_url"
        value="<?php echo e(getBaseURL()); ?>">
    <input type="hidden" id="thischaracterisnotallowed" class="thischaracterisnotallowed" value="<?php echo app('translator')->get('index.this_character_is_not_allowed'); ?>">
    <input type="hidden" name="hidden_alert" id="hidden_alert" class="hidden_alert" value="<?php echo app('translator')->get('index.alert'); ?>">
    <input type="hidden" name="hidden_ok" id="hidden_ok" class="hidden_ok" value="<?php echo app('translator')->get('index.ok'); ?>">
    <input type="hidden" name="hidden_cancel" id="hidden_cancel" class="hidden_cancel" value="<?php echo app('translator')->get('index.cancel'); ?>">
    <input type="hidden" name="are_you_sure" id="are_you_sure" class="are_you_sure" value="<?php echo app('translator')->get('index.are_you_sure'); ?>">
    <input type="hidden" id="file_size_required" value="<?php echo app('translator')->get('index.please_select_less_than_5mb_file'); ?>">
    <input type="hidden" id="file_size_required_1" value="<?php echo app('translator')->get('index.please_select_less_than_1mb_file'); ?>">
    <input type="hidden" id="file_size_required_2" value="<?php echo app('translator')->get('index.please_select_less_than_2mb_file'); ?>">
    <input type="hidden" id="file_size_required_3" value="<?php echo app('translator')->get('index.please_select_less_than_3mb_file'); ?>">
    <input type="hidden" id="file_size_required_4" value="<?php echo app('translator')->get('index.please_select_less_than_4mb_file'); ?>">
    <input type="hidden" id="file_size_required_5" value="<?php echo app('translator')->get('index.please_select_less_than_5mb_file'); ?>">
    <input type="hidden" id="file_size_required_6" value="<?php echo app('translator')->get('index.please_select_less_than_6mb_file'); ?>">
    <input type="hidden" id="file_size_required_7" value="<?php echo app('translator')->get('index.please_select_less_than_7mb_file'); ?>">
    <input type="hidden" id="print_db" value="<?php echo app('translator')->get('index.print_db'); ?>">
    <input type="hidden" id="excel_db" value="<?php echo app('translator')->get('index.excel_db'); ?>">
    <input type="hidden" id="pdf_db" value="<?php echo app('translator')->get('index.pdf_db'); ?>">

    <?php
    $language = '';
    ?>

    <div class="main-preloader">
        <div class="loadingio-spinner-spin-nq4q5u6dq7r">
            <div class="ldio-x2uulkbinbj">
                <div>
                    <div></div>
                </div>
                <div>
                    <div></div>
                </div>
                <div>
                    <div></div>
                </div>
                <div>
                    <div></div>
                </div>
                <div>
                    <div></div>
                </div>
                <div>
                    <div></div>
                </div>
                <div>
                    <div></div>
                </div>
                <div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Site wrapper -->
    <div class="wrapper <?= isset($language) && $language == 'arabic' ? 'arabic-lang"' : '' ?>">

        <header class="main-header <?= isset($language) && $language == 'arabic' ? 'sidebar2_active"' : '' ?>">
            <?php echo $__env->make('layouts.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </header>

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar" <?= isset($language) && $language == 'arabic' ? 'd-none' : '' ?>>
            <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="sidebar_sub_menu">
            </div>
            <?php echo $__env->yieldContent('script_top'); ?>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="footer-inner-area">
                <p>
                    <?php echo e(isset($whiteLabelInfo->footer) ? $whiteLabelInfo->footer : config('app.name')); ?>.
                    <?php echo app('translator')->get('index.developed_by'); ?>
                    <a class="text-decoration-none site-color footer_link" target="_blank"
                        href="<?php echo e($whiteLabelInfo->company_website); ?>"><?php echo e($whiteLabelInfo->company_name); ?></a>
                    <span class="footer_version">Version 1.0</span>
                </p>
            </div>
        </footer>
    </div>
    <!-- jQuery 3 -->
    <script src="<?php echo $baseURL . 'assets/bower_components/jquery/dist/jquery.min.js'; ?>"></script>
    
    <!-- Select2 -->
    <script src="<?php echo $baseURL . 'assets/bower_components/select2/dist/js/select2.full.min.js'; ?>"></script>
    <!-- Bootstrap 5.0.0 -->
    <script src="<?php echo $baseURL . 'assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'; ?>"></script>
    <script src="<?php echo $baseURL . 'assets/bower_components/bootstrap-new/bootstrap.bundle.min.js'; ?>"></script>
    <?php echo $__env->yieldPushContent('top_script'); ?>
    <!-- iCheck -->
    <script src="<?php echo $baseURL . 'assets/plugins/iCheck/icheck.min.js'; ?>"></script>
    <!-- bootstrap datepicker -->
    <script src="<?php echo $baseURL . 'assets/bower_components/datepicker/bootstrap-datepicker.js'; ?>"></script>

    <script src="<?php echo $baseURL . 'frequent_changing/js/iconify-icon.min.js'; ?>"></script>
    <!-- Sweet alert -->
    <script src="<?php echo $baseURL . 'assets/bower_components/sweetalert2/dist/sweetalert.min.js'; ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo $baseURL . 'assets/bower_components/fastclick/lib/fastclick.js'; ?>"></script>
    <script src="<?php echo $baseURL . 'assets/plugins/nice-select/js/jquery.nice-select.min.js'; ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo $baseURL . 'assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js'; ?>"></script>

    <script src="<?php echo $baseURL . 'assets/dist/js/adminlte.min.js'; ?>?v=1.1"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo $baseURL . 'assets/dist/js/demo.js'; ?>?v=1.1"></script>
    <script src="<?php echo $baseURL . 'assets/dist/js/menu.js'; ?>?v=1.1"></script>

    <script type="text/javascript" src="<?php echo $baseURL . 'assets/js/jquery.cookie.js'; ?>"></script>
    <!-- custom scrollbar plugin -->
    <script src="<?php echo $baseURL . 'assets/dist/js/jquery.mCustomScrollbar.concat.min.js'; ?>"></script>

    <!-- material icon -->
    <script src="<?php echo $baseURL . 'assets/dist/js/feather.min.js'; ?>?v=1.1"></script>
    <script src="<?php echo $baseURL . 'frequent_changing/js/user_home_buttom1222021v1.js'; ?>?v=1.1"></script>
    <script src="<?php echo $baseURL . 'frequent_changing/js/user_home.js'; ?>?v=1.1"></script>
    <script src="<?php echo $baseURL . 'frequent_changing/newDesign/js/new-script.js'; ?>?v=1.1"></script>
    <script src="<?php echo $baseURL . 'frequent_changing/js/common_script.js'; ?>?v=1.1"></script>
    <script src="<?php echo $baseURL . 'frequent_changing/js/custom.js'; ?>?v=1.1"></script>
    <?php echo $__env->yieldContent('script'); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\saibhagabati\resources\views/layouts/app.blade.php ENDPATH**/ ?>