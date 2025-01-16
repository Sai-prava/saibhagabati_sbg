

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
            <?php echo e(Form::open(['route'=>'production-loss.store', 'id' => "attendance_form", 'method'=>'post'])); ?>

                <?php echo $__env->make('pages/production_loss/_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo Form::close(); ?>

        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php
    $baseURL = getBaseURL();
    ?>
    <script type="text/javascript" src="<?php echo $baseURL.'frequent_changing/js/production_loss.js'; ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\saibhagabati\resources\views/pages/production_loss/index.blade.php ENDPATH**/ ?>