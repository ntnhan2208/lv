
<?php $__env->startSection('content'); ?>
    <div class="row mt-3 mr-auto ">
        <div class="col-12">
            <div class="card shadow-lg bg-white rounded">
                <div class="card-body">
                    <form action="<?php echo e(route('update_password')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label><?php echo e(trans('site.admin.old_password')); ?></label>
                            <div class="input-group">
                                <input type="password" name="old_password" class="form-control"
                                       placeholder="<?php echo e(trans('site.admin.old_password')); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(trans('site.admin.new_password')); ?></label>
                            <div class="input-group">
                                <input type="password" id="new-password" name="new_password" class="form-control"
                                       placeholder="<?php echo e(trans('site.admin.new_password')); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(trans('site.admin.confirm_password')); ?></label>
                            <div class="input-group">
                                <input type="password" name="confirm_password" class="form-control"
                                       placeholder="<?php echo e(trans('site.admin.confirm_password')); ?>">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 mb-3 mt-2"><i class="fas fa-save"></i>
                            <?php echo e(trans('site.button_update')); ?> </button>
                        <a href="<?php echo e(route('dashboard')); ?>">
                            <button type="button" class="btn btn-danger ml-2
                        px-4 mb-3 mt-2"><i class="fas fa-window-close"></i> <?php echo e(trans('site.reset')); ?> </button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\LVTN-FINAL\nhanhao\resources\views/admin/admins/change-password.blade.php ENDPATH**/ ?>