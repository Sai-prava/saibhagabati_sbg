

<?php $__env->startSection('script_top'); ?>
    <?php
    $baseURL = getBaseURL();
    $setting = getSettingsInfo();
    ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="main-content-wrapper">
        <section class="content-header">
            <h3 class="top-left-header">
                <?php echo e(isset($title) && $title ? $title : ''); ?>

            </h3>
        </section>


        <div class="box-wrapper">
            <!-- general form elements -->
            <div class="table-box">
                <!-- form start -->
                <?php echo Form::model(isset($data) && $data ? $data : '', [
                    'method' => isset($data) && $data ? 'PATCH' : 'POST',
                    'files' => true,
                    'route' => ['role.update', isset($data->id) && $data->id ? $data->id : ''],
                    'id' => 'common-form',
                ]); ?>

                <?php echo csrf_field(); ?>
                <div>
                    <div class="row">
                        <div class="col-sm-12 mb-2 col-md-4">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('index.role_name'); ?><?php echo starSign(); ?></label>
                                <input type="text" name="title" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="<?php echo e(__('index.role_name')); ?>"
                                    value="<?php echo e(isset($data) && $data->title ? $data->title : old('title')); ?>">
                            </div>
                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label><b><?php echo app('translator')->get('index.role_permission'); ?></b></label>
                        </div>

                        <div class="form-group">
                            <input type="checkbox" class="form-check-input" id="select_all_role">
                            <label for="select_all_role"><?php echo app('translator')->get('index.select_all'); ?></label>
                        </div>

                        <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_key => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($menu->title != 'Home'): ?>
                                <div class="col-md-12 mt-4">
                                    <div class="form-group">
                                        <input <?php echo e(isset($data) && in_array($menu->id, $data->menu_ids) ? 'checked' : ''); ?>

                                            id="menu_<?php echo e($menu->id); ?>"
                                            class="menu_class form-check-input check_menu_<?php echo e($menu->id); ?>"
                                            data-name = "<?php echo e($menu_key + 1); ?>" data-id=<?php echo e($menu->id); ?> type="checkbox"
                                            value="<?php echo e($menu->id); ?>">
                                        <label for="menu_<?php echo e($menu->id); ?>"><b><?php echo e($menu->title); ?></b></label>
                                    </div>
                                </div>
                                <span>
                                    <hr class="m-0">
                                </span>
                            <?php endif; ?>

                            <?php $__currentLoopData = $menu->activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity_key => $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-4 mt-2">
                                    <div class="form-group">

                                        <input
                                            <?php echo e((isset($data) && in_array($activity->id, $data->activity_ids)) || $activity->auto_select == 'Yes' ? 'checked' : ''); ?>

                                            id="menu_activity_<?php echo e($activity->id); ?>" data-id = "<?php echo e($menu->id); ?>"
                                            class="activity_class form-check-input menu_activities_<?php echo e($menu->id); ?>"
                                            type="checkbox" name="activity_id[]" value="<?php echo e($activity->id); ?>">
                                        <label
                                            for="menu_activity_<?php echo e($activity->id); ?>"><?php echo e($activity->activity_name); ?></label>
                                    </div>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="row mt-2">
                        <div class="col-sm-12 col-md-6 mb-2 d-flex gap-3">
                            <button type="submit" name="submit" value="submit" class="btn bg-blue-btn"><iconify-icon
                                    icon="solar:check-circle-broken"></iconify-icon><?php echo app('translator')->get('index.submit'); ?></button>
                            <a class="btn bg-second-btn" href="<?php echo e(route('role.index')); ?>"><iconify-icon
                                    icon="solar:round-arrow-left-broken"></iconify-icon><?php echo app('translator')->get('index.back'); ?></a>
                        </div>
                    </div>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php
    $baseURL = getBaseURL();
    ?>
    <script type="text/javascript" src="<?php echo $baseURL . 'frequent_changing/js/role.js'; ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sbg_product\resources\views/pages/role/addEdit.blade.php ENDPATH**/ ?>