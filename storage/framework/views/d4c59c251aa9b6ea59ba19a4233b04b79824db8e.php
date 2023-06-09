<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <form action="<?php echo e(route('customers.update',$customer->id)); ?>" method="POST"
                          enctype="multipart/form-data">
                        <?php echo e(method_field('PUT')); ?>

                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label><?php echo e(trans('site.customer.name')); ?> </label>
                            <div class="input-group">
                                <input type="text" id="example-input1-group1" name="name" class="form-control"
                                       value="<?php echo e($customer->name); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(trans('site.customer.phone')); ?> </label>
                            <div class="input-group">
                                <input type="text" id="example-input1-group1" name="phone" class="form-control"
                                       value="<?php echo e($customer->phone); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(trans('site.customer.email')); ?> </label>
                            <div class="input-group">
                                <input type="email" id="example-input1-group1" name="email" class="form-control"
                                       value="<?php echo e($customer->email); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo e(trans('site.customer.personal_id')); ?> </label>
                            <div class="input-group">
                                <input type="text" id="example-input1-group1" name="personal_id" class="form-control"
                                       value="<?php echo e($customer->personal_id); ?>">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 mb-3 mt-2">
                            <i class="mdi mdi-plus-circle-outline mr-2"></i>
                            <?php echo e(trans('site.button_update')); ?>

                        </button>
                        <a href="<?php echo e(route('customers.index')); ?>">
                            <button type="button" class="btn btn-danger ml-2
                    px-4 mb-3 mt-2"><i class="fas fa-window-close"></i> <?php echo e(trans('site.reset')); ?> </button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card mt-3">
                <div class="card-body shadow-lg bg-white rounded">
                    <label>LỊCH SỬ THANH TOÁN</label>




























                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV\luanvan\resources\views/admin/customers/edit.blade.php ENDPATH**/ ?>