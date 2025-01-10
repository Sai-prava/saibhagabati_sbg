

<?php $__env->startSection('script_top'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php
$setting = getSettingsInfo();
$tax_setting = getTaxInfo();
$baseURL = getBaseURL();
?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="main-content-wrapper">
    <section class="content-header">
        <h3 class="top-left-header"><?php echo e(isset($title) && $title?$title:''); ?></h3>
    </section>

    <div class="box-wrapper">
        <!-- general form elements -->
        <div class="table-box">
            <!-- form start -->
            <?php echo e(Form::model($obj,['route'=>['attendance.update',$obj->id],'method'=>'put'])); ?>

                <?php echo $__env->make('pages/attendance/_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo Form::close(); ?>

        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo $baseURL.'assets/plugins/local/jquery.timepicker.min.js'; ?>"></script>
<link rel="stylesheet" href="<?php echo $baseURL.'assets/plugins/local/jquery.timepicker.min.css'; ?>">
<script src="<?php echo $baseURL.'frequent_changing/js/attendance.js'; ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sbg_product\resources\views/pages/attendance/edit.blade.php ENDPATH**/ ?>