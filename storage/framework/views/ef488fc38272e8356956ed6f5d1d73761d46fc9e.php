<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <form action="<?php echo e(route('customers.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label><?php echo e(trans('site.customer.name')); ?> </label>
                            <div class="input-group">
                                <input type="text" id="example-input1-group1" name="name" class="form-control"
                                       placeholder="<?php echo e(trans('site.customer.name')); ?>"
                                       value="<?php echo e(old('name')); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(trans('site.customer.phone')); ?> </label>
                            <div class="input-group">
                                <input type="text" id="example-input1-group1" name="phone" class="form-control"
                                       placeholder="<?php echo e(trans('site.customer.phone')); ?>"
                                       value="<?php echo e(old('phone')); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(trans('site.customer.email')); ?> </label>
                            <div class="input-group">
                                <input type="email" id="example-input1-group1" name="email" class="form-control"
                                       placeholder="<?php echo e(trans('site.customer.email')); ?>"
                                       value="<?php echo e(old('email')); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(trans('site.customer.personal_id')); ?> </label>
                            <div class="input-group">
                                <input type="text" id="example-input1-group1" name="personal_id" class="form-control"
                                       placeholder="<?php echo e(trans('site.customer.personal_id')); ?>"
                                       value="<?php echo e(old('personal_id')); ?>">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 mb-3 mt-2">
                            <i class="mdi mdi-plus-circle-outline mr-2"></i>
                            <?php echo e(trans('site.button_add')); ?>

                        </button>
                        <a href="<?php echo e(route('customers.index')); ?>">
                            <button type="button" class="btn btn-danger ml-2
                    px-4 mb-3 mt-2"><i class="fas fa-window-close"></i> <?php echo e(trans('site.reset')); ?> </button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV\luanvan\resources\views/admin/customers/add.blade.php ENDPATH**/ ?>