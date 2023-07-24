
<?php $__env->startSection('content'); ?>
    <div class="row">
        <form class="container-fluid" action="<?php echo e(route('services.store')); ?>" method="POST"
              enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="col-lg-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <p class="text-uppercase font-14"><?php echo e(trans('site.main_content')); ?></p>
                        <div class="tab-content detail-list pro-order-box" id="pills-tabContent">

                            <div class="col-12">
                                <div class="form-group">
                                    <label><?php echo e(trans('site.service.name')); ?></label>
                                    <div class="input-group">
                                        <input type="text" name="name"
                                               class="form-control name"
                                               placeholder="<?php echo e(trans('site.service.name')); ?>"
                                               value="<?php echo e(old('name')); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(trans('site.service.description')); ?></label>
                                    <div class="input-group">
                                                    <textarea name="description"
                                                              class="form-control"
                                                              placeholder="<?php echo e(trans('site.service.description')); ?>"><?php echo e(old('description')); ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(trans('site.service.price')); ?></label>
                                    <div class="input-group">
                                        <input type="text" name="price"
                                               class="form-control"
                                               placeholder="<?php echo e(trans('site.service.price')); ?>"
                                               value="<?php echo e(old('price')); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Đơn giá</label>
                                    <select name="unit_price"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                        <?php $__currentLoopData = config('system.unit_price'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($k>1): ?>
                                                <option value="<?php echo e($k); ?>" <?php echo e(old('unit_price') == $k ? 'selected':''); ?>><?php echo e($v); ?></option>
                                            <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(trans('site.service.is_enabled')); ?></label>
                                    <select name="is_enabled"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                        <?php $__currentLoopData = config('system.is_enabled'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($k); ?>" <?php echo e(old('is_enabled') == $k ? 'selected':''); ?>><?php echo e($v); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <button type="submit" class="btn btn-blue ml-2 px-4 mt-3 mb-3">
                            <i class="mdi mdi-check-all mr-2"></i><?php echo e(trans('site.button_add')); ?></button>
                        <a href="<?php echo e(route('services.index')); ?>">
                            <button type="button"
                                    class="btn btn-danger ml-2 px-4 mb-3 mt-3"><i class="fas fa-window-close"></i>
                                <?php echo e(trans('site.reset')); ?>

                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\DEV\lv\resources\views/admin/services/add.blade.php ENDPATH**/ ?>